<?php

use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Hash;

test('database seeder restores core demo accounts and content idempotently', function () {
    config([
        'app.env' => 'testing',
        'demo.author_password' => 'guru2026',
    ]);

    $this->seed(DatabaseSeeder::class);
    $this->seed(DatabaseSeeder::class);

    expect(User::where('email', 'superadmin@gmail.com')->count())->toBe(1)
        ->and(User::where('email', 'superadmin@gmail.com')->first()->role)->toBe(User::ROLE_SUPERADMIN)
        ->and(User::whereIn('email', ['user1@gmail.com', 'user2@gmail.com', 'user3@gmail.com'])->count())->toBe(3)
        ->and(User::whereIn('email', ['user1@gmail.com', 'user2@gmail.com', 'user3@gmail.com'])
            ->where('role', User::ROLE_AUTHOR)
            ->count())->toBe(3)
        ->and(Category::count())->toBeGreaterThanOrEqual(10)
        ->and(Content::count())->toBe(30);

    expect(Hash::check('guru2026', User::where('email', 'user1@gmail.com')->first()->password))->toBeTrue();
});

test('database seeder does not reset an existing superadmin password without an env value', function () {
    config(['demo.superadmin_password' => null]);
    $originalHash = Hash::make('already-set-password');

    User::factory()->create([
        'name' => 'Old Name',
        'email' => 'superadmin@gmail.com',
        'role' => User::ROLE_ADMIN,
        'password' => $originalHash,
    ]);

    $this->seed(DatabaseSeeder::class);

    $superadmin = User::where('email', 'superadmin@gmail.com')->first();

    expect($superadmin->role)->toBe(User::ROLE_SUPERADMIN)
        ->and($superadmin->password)->toBe($originalHash);
});
