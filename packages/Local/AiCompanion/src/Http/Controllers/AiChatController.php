<?php

namespace Local\AiCompanion\Http\Controllers;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Local\AiCompanion\Services\GeminiClient;
use Local\AiCompanion\Services\PromptBuilder;
use Local\AiCompanion\Services\SessionMemoryManager;

class AiChatController extends Controller
{
    public function session(SessionMemoryManager $memory): JsonResponse
    {
        return response()->json([
            'messages' => $memory->getMessages(),
        ]);
    }

    public function chat(
        Request $request,
        SessionMemoryManager $memory,
        PromptBuilder $promptBuilder,
        GeminiClient $gemini
    ): JsonResponse {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $userMessage = trim($validated['message']);

        if ($userMessage === '') {
            return response()->json([
                'message' => 'Message cannot be empty.',
            ], 422);
        }

        try {
            $messages = $memory->getContextMessages();

            // Load webapp help knowledge document for RAG injection.
            // This lets Guru answer website usage questions in addition to learning guidance.
            // If webhelper.md is missing, Guru falls back to learning-companion-only mode.
            $webContext = '';
            $webhelperPath = base_path('webhelper.md');
            if (file_exists($webhelperPath)) {
                $webContext = file_get_contents($webhelperPath);
            }

            $prompt = $promptBuilder->build($messages, $userMessage, $webContext);

            $reply = $gemini->generate($prompt);

            $memory->addUserMessage($userMessage);
            $memory->addAssistantMessage($reply);

            return response()->json([
                'reply' => $reply,
                'messages' => $memory->getMessages(),
            ]);
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => 'The Great Guru is temporarily unavailable. Please try again later.',
            ], 503);
        }
    }

    public function clear(SessionMemoryManager $memory): JsonResponse
    {
        $memory->clear();

        return response()->json([
            'message' => 'AI companion session memory cleared.',
        ]);
    }
}
