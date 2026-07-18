<?php

namespace Local\AiCompanion\Services;

use App\Models\AiConversation;

class SessionMemoryManager
{
    public function getMessages(): array
    {
        $conversation = $this->getActiveConversation();

        if (! $conversation) {
            return [];
        }

        return $this->formatMessages($conversation, $this->maxMessages());
    }

    public function getContextMessages(): array
    {
        $conversation = $this->getActiveConversation();

        if (! $conversation) {
            return [];
        }

        return $this->formatMessages($conversation, $this->contextMessages());
    }

    public function addUserMessage(string $message): void
    {
        $this->addMessage('user', $message);
    }

    public function addAssistantMessage(string $message): void
    {
        $this->addMessage('assistant', $message);
    }

    public function clear(): void
    {
        $conversation = $this->getActiveConversation();

        if ($conversation) {
            $conversation->messages()->delete();
            $conversation->update([
                'status' => 'cleared',
                'last_activity_at' => now(),
            ]);
        }

        session()->forget($this->sessionKey());
    }

    private function addMessage(string $role, string $content): void
    {
        $conversation = $this->getOrCreateConversation($content);

        $conversation->messages()->create([
            'role' => $role,
            'content' => $content,
            'model' => $role === 'assistant' ? config('ai-companion.gemini.model') : null,
        ]);

        $conversation->update([
            'last_activity_at' => now(),
        ]);

        $this->pruneMessages($conversation);
    }

    private function getActiveConversation(): ?AiConversation
    {
        $conversationId = session()->get($this->sessionKey());
        $userId = auth()->id();

        if (! $conversationId || ! $userId) {
            return null;
        }

        $conversation = AiConversation::query()
            ->whereKey($conversationId)
            ->where('user_id', $userId)
            ->where('status', 'active')
            ->first();

        if (! $conversation) {
            session()->forget($this->sessionKey());

            return null;
        }

        if ($conversation->expires_at && $conversation->expires_at->isPast()) {
            $conversation->update(['status' => 'expired']);
            session()->forget($this->sessionKey());

            return null;
        }

        return $conversation;
    }

    private function getOrCreateConversation(string $firstMessage): AiConversation
    {
        $conversation = $this->getActiveConversation();

        if ($conversation) {
            return $conversation;
        }

        $conversation = AiConversation::query()->create([
            'user_id' => auth()->id(),
            'title' => $this->makeTitle($firstMessage),
            'status' => 'active',
            'last_activity_at' => now(),
            'expires_at' => now()->addDays((int) config('ai-companion.memory.authenticated_retention_days', 7)),
        ]);

        session()->put($this->sessionKey(), $conversation->id);

        return $conversation;
    }

    private function formatMessages(AiConversation $conversation, int $limit): array
    {
        return $conversation->messages()
            ->latest('id')
            ->limit($limit)
            ->get()
            ->sortBy('id')
            ->values()
            ->map(function ($message) {
                return [
                    'role' => $message->role,
                    'content' => $message->content,
                    'created_at' => $message->created_at?->toDateTimeString(),
                ];
            })
            ->all();
    }

    private function pruneMessages(AiConversation $conversation): void
    {
        $maxMessages = $this->maxMessages();
        $messageCount = $conversation->messages()->count();

        if ($messageCount <= $maxMessages) {
            return;
        }

        $deleteCount = $messageCount - $maxMessages;

        $messageIds = $conversation->messages()
            ->oldest()
            ->limit($deleteCount)
            ->pluck('id');

        $conversation->messages()
            ->whereIn('id', $messageIds)
            ->delete();
    }

    private function makeTitle(string $message): string
    {
        $message = trim(preg_replace('/\s+/', ' ', $message) ?? '');

        if (mb_strlen($message) <= 80) {
            return $message;
        }

        return mb_substr($message, 0, 77) . '...';
    }

    private function sessionKey(): string
    {
        return config('ai-companion.memory.session_key', 'active_ai_conversation_id');
    }

    private function maxMessages(): int
    {
        return (int) config('ai-companion.memory.max_messages', 100);
    }

    private function contextMessages(): int
    {
        return (int) config('ai-companion.memory.context_messages', 20);
    }
}
