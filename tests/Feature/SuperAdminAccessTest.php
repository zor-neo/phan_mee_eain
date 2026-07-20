<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\AdminController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class SuperAdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_superadmin_can_open_access_control_page(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $this->actingAs($superadmin);
        $response = app(AdminController::class)->accessControl();

        $this->assertSame('admin.home.accessControl', $response->name());
    }

    public function test_superadmin_admin_page_contains_logout_csrf_markup(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $response = $this->actingAs($superadmin)->get('/admins/page');

        $response->assertOk();
        $response->assertSee('name="csrf-token"', false);
        $response->assertSee('action="'.route('logout').'"', false);
        $response->assertSee('name="_token"', false);
    }

    public function test_superadmin_can_grant_admin_access_to_user(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $user = User::factory()->create([
            'role' => User::ROLE_USER,
        ]);

        $this->actingAs($superadmin);
        $request = Request::create("/admins/access-control/{$user->id}", 'POST', [
            'role' => User::ROLE_ADMIN,
        ]);

        $response = app(AdminController::class)->updateAccess($request, $user);

        $this->assertTrue($response->isRedirection());
        $this->assertSame(User::ROLE_ADMIN, $user->refresh()->role);
    }

    public function test_superadmin_access_update_redirects_back_to_access_control_page(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $user = User::factory()->create([
            'role' => User::ROLE_USER,
        ]);

        $response = $this->actingAs($superadmin)->post(route('accessControl#Update', $user), [
            'role' => User::ROLE_ADMIN,
        ]);

        $response->assertRedirect(route('accessControlPage'));
        $this->assertSame(User::ROLE_ADMIN, $user->refresh()->role);

        $this->actingAs($superadmin)
            ->get(route('accessControlPage'))
            ->assertOk()
            ->assertSee($user->email);
    }

    public function test_legacy_singular_admin_access_control_path_redirects_to_canonical_page(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $this->actingAs($superadmin)
            ->get('/admin/access-control')
            ->assertRedirect(route('accessControlPage'));
    }

    public function test_legacy_singular_admin_access_control_update_still_grants_access(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $user = User::factory()->create([
            'role' => User::ROLE_USER,
        ]);

        $this->actingAs($superadmin)
            ->post("/admin/access-control/{$user->id}", [
                'role' => User::ROLE_ADMIN,
            ])
            ->assertRedirect(route('accessControlPage'));

        $this->assertSame(User::ROLE_ADMIN, $user->refresh()->role);
    }

    public function test_normal_admin_cannot_grant_admin_access(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $user = User::factory()->create([
            'role' => User::ROLE_USER,
        ]);

        $this->actingAs($admin);

        try {
            app(AdminController::class)->updateAccess(Request::create(
                "/admins/access-control/{$user->id}",
                'POST',
                ['role' => User::ROLE_ADMIN]
            ), $user);
            $this->fail('Normal admin was allowed to update account access.');
        } catch (HttpException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
        }

        $this->assertSame(User::ROLE_USER, $user->refresh()->role);
    }

    public function test_normal_admin_cannot_open_access_control_page(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $this->actingAs($admin);

        try {
            app(AdminController::class)->accessControl();
            $this->fail('Normal admin was allowed to open access control.');
        } catch (HttpException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
        }
    }

    public function test_superadmin_role_cannot_be_assigned_from_access_control(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $user = User::factory()->create([
            'role' => User::ROLE_USER,
        ]);

        $this->actingAs($superadmin);

        try {
            app(AdminController::class)->updateAccess(Request::create(
                "/admins/access-control/{$user->id}",
                'POST',
                ['role' => User::ROLE_SUPERADMIN]
            ), $user);
            $this->fail('Superadmin role was allowed through access control.');
        } catch (ValidationException $exception) {
            $this->assertArrayHasKey('role', $exception->errors());
        }

        $this->assertSame(User::ROLE_USER, $user->refresh()->role);
    }

    public function test_superadmin_account_cannot_be_deleted(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $this->actingAs($admin);

        try {
            app(AdminController::class)->deleteUser($superadmin->id);
            $this->fail('Superadmin account was allowed to be deleted.');
        } catch (HttpException $exception) {
            $this->assertSame(403, $exception->getStatusCode());
        }

        $this->assertDatabaseHas('users', [
            'id' => $superadmin->id,
            'role' => User::ROLE_SUPERADMIN,
        ]);
    }

    public function test_admin_view_mode_redirects_to_selected_view(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $this->actingAs($admin)
            ->post(route('viewMode#Process'), ['mode' => 'user'])
            ->assertRedirect(route('userHome'));

        $this->assertSame('user', session('acting_view_mode'));

        $this->actingAs($admin)
            ->post(route('viewMode#Process'), ['mode' => 'author_readonly'])
            ->assertRedirect(route('auther#Room'));

        $this->assertSame('author_readonly', session('acting_view_mode'));

        $this->actingAs($admin)
            ->post(route('viewMode#Process'), ['mode' => 'admin'])
            ->assertRedirect(route('adminHome'));

        $this->assertSame('admin', session('acting_view_mode'));
    }

    public function test_superadmin_can_use_view_mode_dropdown(): void
    {
        $superadmin = User::factory()->create([
            'role' => User::ROLE_SUPERADMIN,
        ]);

        $this->actingAs($superadmin)
            ->post(route('viewMode#Process'), ['mode' => 'user'])
            ->assertRedirect(route('userHome'));

        $this->assertSame('user', session('acting_view_mode'));
    }

    public function test_admin_layout_uses_view_mode_dropdown_without_account_back_button(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        session(['acting_view_mode' => 'user']);

        $this->actingAs($admin)
            ->get(route('adminHome'))
            ->assertOk()
            ->assertSee('View as Admin')
            ->assertSee('View as User')
            ->assertSee('View as Author (Read-Only)')
            ->assertDontSee('Back to Admin');
    }

    public function test_admin_view_mode_dropdown_is_visible_on_user_home(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $this->actingAs($admin)
            ->withSession(['acting_view_mode' => 'user'])
            ->get(route('userHome'))
            ->assertOk()
            ->assertSee('View Mode')
            ->assertSee('View as Admin')
            ->assertSee('View as User')
            ->assertSee('View as Author (Read-Only)');
    }

    public function test_admin_view_mode_dropdown_is_visible_on_author_home(): void
    {
        $admin = User::factory()->create([
            'role' => User::ROLE_ADMIN,
        ]);

        $this->actingAs($admin)
            ->withSession(['acting_view_mode' => 'author_readonly'])
            ->get(route('auther#Room'))
            ->assertOk()
            ->assertSee('View Mode')
            ->assertSee('View as Admin')
            ->assertSee('View as User')
            ->assertSee('View as Author (Read-Only)');
    }
}
