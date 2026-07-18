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

        User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'role'=>'admin',
            'password'=>Hash::make('super1234'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
