<?php

namespace Local\AiCompanion\Services;

class SessionMemoryManager
{
    private string $sessionKey = 'ai_companion.messages';

    public function getMessages(): array
    {
        return session()->get($this->sessionKey, []);
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
        session()->forget($this->sessionKey);
    }

    private function addMessage(string $role, string $content): void
    {
        $messages = $this->getMessages();

        $messages[] = [
            'role' => $role,
            'content' => $content,
            'created_at' => now()->toDateTimeString(),
        ];

        $maxMessages = config('ai-companion.memory.max_messages', 20);

        if (count($messages) > $maxMessages) {
            $messages = array_slice($messages, -$maxMessages);
        }

        session()->put($this->sessionKey, $messages);
    }
}