<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // ==================== DATA SUPERADMIN (4 AKUN) ====================
        $superadmins = [
            [
                'name' => 'Super Administrator 1',
                'username' => 'superadmin1',
                'email' => 'superadmin1@pesantren.com',
                'password' => 'superadmin123',
                'phone' => '08123456780',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
            ],
            [
                'name' => 'Super Administrator 2',
                'username' => 'superadmin2',
                'email' => 'superadmin2@pesantren.com',
                'password' => 'superadmin123',
                'phone' => '08123456781',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
            ],
            [
                'name' => 'Super Administrator 3',
                'username' => 'superadmin3',
                'email' => 'superadmin3@pesantren.com',
                'password' => 'superadmin123',
                'phone' => '08123456782',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
            ],
            [
                'name' => 'Super Administrator 4',
                'username' => 'superadmin4',
                'email' => 'superadmin4@pesantren.com',
                'password' => 'superadmin123',
                'phone' => '08123456783',
                'address' => 'Kantor Pusat Pondok Pesantren Al Ifadah',
            ],
        ];

        // Loop untuk membuat superadmin
        foreach ($superadmins as $superadmin) {
            if (!User::where('email', $superadmin['email'])->exists()) {
                User::create([
                    'name' => $superadmin['name'],
                    'username' => $superadmin['username'],
                    'email' => $superadmin['email'],
                    'password' => Hash::make($superadmin['password']),
                    'role' => 'superadmin',
                    'status' => 'active',
                    'phone' => $superadmin['phone'],
                    'address' => $superadmin['address'],
                    'email_verified_at' => now(),
                ]);
                $this->command->info("Super Admin created: {$superadmin['email']} / {$superadmin['password']}");
            }
        }

        // ==================== DATA ADMIN DEFAULT ====================
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

        // ==================== PERBAIKI USER YANG SALAH ROLE ====================
        // Daftar email yang boleh memiliki role 'admin' atau 'superadmin'
        $allowedAdminEmails = [
            'admin@pesantren.com',
            'superadmin1@pesantren.com',
            'superadmin2@pesantren.com',
            'superadmin3@pesantren.com',
            'superadmin4@pesantren.com',
        ];

        // Perbaiki user yang salah role (seharusnya user tapi jadi admin)
        $fixed = User::where('role', 'admin')
            ->whereNotIn('email', $allowedAdminEmails)
            ->update(['role' => 'user']);

        if ($fixed) {
            $this->command->info("Fixed {$fixed} users with incorrect admin role");
        }

        // Pastikan tidak ada user dengan role 'user' yang statusnya superadmin
        $fixedSuper = User::where('role', 'user')
            ->whereIn('email', $allowedAdminEmails)
            ->update(['role' => 'superadmin']);

        if ($fixedSuper) {
            $this->command->info("Fixed {$fixedSuper} users with incorrect user role to superadmin");
        }

        // ==================== INFORMASI AKUN ====================
        $this->command->newLine();
        $this->command->info('╔══════════════════════════════════════════════════════════════╗');
        $this->command->info('║                    AKUN SUPERADMIN (4 Akun)                 ║');
        $this->command->info('╠══════════════════════════════════════════════════════════════╣');
        $this->command->info('║  superadmin1@pesantren.com  │  Password: superadmin123      ║');
        $this->command->info('║  superadmin2@pesantren.com  │  Password: superadmin123      ║');
        $this->command->info('║  superadmin3@pesantren.com  │  Password: superadmin123      ║');
        $this->command->info('║  superadmin4@pesantren.com  │  Password: superadmin123      ║');
        $this->command->info('╠══════════════════════════════════════════════════════════════╣');
        $this->command->info('║                       AKUN ADMIN DEFAULT                    ║');
        $this->command->info('╠══════════════════════════════════════════════════════════════╣');
        $this->command->info('║  admin@pesantren.com        │  Password: admin123            ║');
        $this->command->info('╚══════════════════════════════════════════════════════════════╝');
        $this->command->newLine();
    }
}