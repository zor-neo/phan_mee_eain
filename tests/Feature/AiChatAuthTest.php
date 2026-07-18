<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * AiChatAuthTest
 *
 * Proves that the AI companion routes are protected by the auth middleware.
 *
 * Security requirement (PROJECT_SPEC.md §8, AGENTS.md §10):
 *   The main application must authenticate the user before forwarding requests
 *   to the AI service. Unauthenticated users must never reach the Gemini API.
 */
class AiChatAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_get_session_redirects_to_login(): void
    {
        $response = $this->get('/ai/session');
        $response->assertRedirect('/login');
    }

    public function test_unauthenticated_post_chat_returns_401(): void
    {
        $response = $this->postJson('/ai/chat', ['message' => 'hello']);
        $response->assertStatus(401);
    }

    public function test_unauthenticated_post_clear_returns_401(): void
    {
        $response = $this->postJson('/ai/clear');
        $response->assertStatus(401);
    }

    public function test_authenticated_user_can_reach_session_endpoint(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get('/ai/session');
        $response->assertOk();
        $response->assertJsonStructure(['messages']);
    }

    public function test_authenticated_author_can_reach_session_endpoint(): void
    {
        $user = User::factory()->create(['role' => 'auther']);
        $response = $this->actingAs($user)->get('/ai/session');
        $response->assertOk();
        $response->assertJsonStructure(['messages']);
    }

    public function test_authenticated_admin_can_reach_session_endpoint(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($user)->get('/ai/session');
        $response->assertOk();
        $response->assertJsonStructure(['messages']);
    }
}