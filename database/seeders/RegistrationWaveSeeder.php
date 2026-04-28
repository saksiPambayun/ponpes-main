<?php

namespace Database\Seeders;

use App\Models\RegistrationWave;
use Illuminate\Database\Seeder;

class RegistrationWaveSeeder extends Seeder
{
    public function run(): void
    {
        RegistrationWave::create([
            'name' => 'Gelombang 1',
            'description' => 'Pendaftaran awal tahun ajaran baru',
            'start_date' => now()->subDays(10),
            'end_date' => now()->addDays(20),
            'is_active' => true,
            'quota' => 100,
            'registered_count' => 0,
        ]);

        RegistrationWave::create([
            'name' => 'Gelombang 2',
            'description' => 'Pendaftaran gelombang kedua',
            'start_date' => now()->addDays(21),
            'end_date' => now()->addDays(50),
            'is_active' => false,
            'quota' => 100,
            'registered_count' => 0,
        ]);
    }
}