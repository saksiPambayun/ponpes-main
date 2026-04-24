<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Buat admin jika belum ada
        if (!User::where('email', 'admin@pesantren.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@pesantren.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
                'phone' => '08123456789',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Admin user created: admin@pesantren.com / admin123');
        }

        // Buat superadmin jika belum ada
        if (!User::where('email', 'superadmin@pesantren.com')->exists()) {
            User::create([
                'name' => 'Super Administrator',
                'username' => 'superadmin',
                'email' => 'superadmin@pesantren.com',
                'password' => Hash::make('superadmin123'),
                'role' => 'superadmin',
                'status' => 'active',
                'phone' => '08123456780',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Super Admin user created: superadmin@pesantren.com / superadmin123');
        }

        // Perbaiki user yang salah role
        $fixed = User::where('role', 'admin')
            ->whereNotIn('email', ['admin@pesantren.com', 'superadmin@pesantren.com'])
            ->update(['role' => 'user']);

        if ($fixed) {
            $this->command->info("Fixed {$fixed} users with incorrect admin role");
        }
    }
}
