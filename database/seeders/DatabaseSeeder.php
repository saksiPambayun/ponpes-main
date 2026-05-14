<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil AdminUserSeeder untuk membuat akun admin & superadmin
        $this->call(AdminUserSeeder::class);

        // Optional: tambahkan test user biasa jika diperlukan
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'username' => 'testuser',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'user',
                'status' => 'active',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
