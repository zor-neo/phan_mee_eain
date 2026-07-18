<?php

namespace Tests\Feature;

use App\Models\AiConversation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AiDatabaseMemoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_messages_are_persisted_in_database_for_authenticated_user(): void
    {
        config([
            'ai-companion.gemini.keys' => ['test-gemini-key'],
        ]);

        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Learn the basics first, then practice daily.'],
                            ],
                        ],
                    ],
                ],
            ]),
        ]);

        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->postJson('/ai/chat', [
            'message' => 'How should I learn Laravel?',
        ]);

        $response->assertOk()
            ->assertJsonPath('reply', 'Learn the basics first, then practice daily.')
            ->assertJsonCount(2, 'messages');

        $this->assertDatabaseHas('ai_conversations', [
            'user_id' => $user->id,
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('ai_messages', [
            'role' => 'user',
            'content' => 'How should I learn Laravel?',
        ]);

        $this->assertDatabaseHas('ai_messages', [
            'role' => 'assistant',
            'content' => 'Learn the basics first, then practice daily.',
        ]);

        $sessionResponse = $this->actingAs($user)->get('/ai/session');

        $sessionResponse->assertOk()
            ->assertJsonCount(2, 'messages')
            ->assertJsonPath('messages.0.role', 'user')
            ->assertJsonPath('messages.1.role', 'assistant');
    }

    public function test_user_cannot_read_or_continue_another_users_active_conversation(): void
    {
        config([
            'ai-companion.gemini.keys' => ['test-gemini-key'],
        ]);

        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'This is a separate conversation.'],
                            ],
                        ],
                    ],
                ],
            ]),
        ]);

        $owner = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);

        $otherConversation = AiConversation::query()->create([
            'user_id' => $otherUser->id,
            'title' => 'Private question',
            'status' => 'active',
            'last_activity_at' => now(),
            'expires_at' => now()->addDays(7),
        ]);

        $otherConversation->messages()->create([
            'role' => 'user',
            'content' => 'Do not show this message.',
        ]);

        $sessionResponse = $this->actingAs($owner)
            ->withSession(['active_ai_conversation_id' => $otherConversation->id])
            ->get('/ai/session');

        $sessionResponse->assertOk()
            ->assertJsonPath('messages', []);

        $chatResponse = $this->actingAs($owner)
            ->withSession(['active_ai_conversation_id' => $otherConversation->id])
            ->postJson('/ai/chat', [
                'message' => 'Start my own chat.',
            ]);

        $chatResponse->assertOk();

        $this->assertDatabaseHas('ai_conversations', [
            'user_id' => $owner->id,
            'status' => 'active',
        ]);

        $this->assertDatabaseMissing('ai_messages', [
            'conversation_id' => $otherConversation->id,
            'content' => 'Start my own chat.',
        ]);
    }

    public function test_clear_marks_active_conversation_cleared_and_removes_messages(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $conversation = AiConversation::query()->create([
            'user_id' => $user->id,
            'title' => 'Temporary chat',
            'status' => 'active',
            'last_activity_at' => now(),
            'expires_at' => now()->addDays(7),
        ]);

        $conversation->messages()->create([
            'role' => 'user',
            'content' => 'Temporary message',
        ]);

        $response = $this->actingAs($user)
            ->withSession(['active_ai_conversation_id' => $conversation->id])
            ->postJson('/ai/clear');

        $response->assertOk();

        $this->assertDatabaseHas('ai_conversations', [
            'id' => $conversation->id,
            'status' => 'cleared',
        ]);

        $this->assertDatabaseMissing('ai_messages', [
            'conversation_id' => $conversation->id,
            'content' => 'Temporary message',
        ]);
    }
}
