<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $superadmin = User::firstOrNew(['email' => 'superadmin@gmail.com']);
        $superadminPassword = env('SUPERADMIN_PASSWORD');

        $superadmin->forceFill([
            'name' => 'SuperAdmin',
            'role' => User::ROLE_SUPERADMIN,
            'email_verified_at' => $superadmin->email_verified_at ?: Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if (! $superadmin->exists || filled($superadminPassword)) {
            $superadmin->password = Hash::make($superadminPassword ?: 'super1234');
        }

        $superadmin->save();

        $this->call(DemoLearningContentSeeder::class);
    }
}
