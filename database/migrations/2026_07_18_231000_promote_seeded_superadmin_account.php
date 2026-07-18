<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')
            ->where('email', 'superadmin@gmail.com')
            ->where('role', User::ROLE_ADMIN)
            ->update([
                'role' => User::ROLE_SUPERADMIN,
                'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')
            ->where('email', 'superadmin@gmail.com')
            ->where('role', User::ROLE_SUPERADMIN)
            ->update([
                'role' => User::ROLE_ADMIN,
                'updated_at' => now(),
            ]);
    }
};
