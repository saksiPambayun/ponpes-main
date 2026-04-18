<?php
// database/seeders/RegistrationWaveSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistrationWave;

class RegistrationWaveSeeder extends Seeder
{
    public function run()
    {
        RegistrationWave::create([
            'name' => 'Gelombang 1',
            'start_date' => '2026-03-10',
            'end_date' => '2026-05-02',
            'is_active' => true,
            'description' => 'Pendaftaran gelombang pertama',
            'quota' => 100,
            'registered_count' => 0
        ]);

        RegistrationWave::create([
            'name' => 'Gelombang 2',
            'start_date' => '2026-06-10',
            'end_date' => '2026-07-02',
            'is_active' => false,
            'description' => 'Pendaftaran gelombang kedua',
            'quota' => 150,
            'registered_count' => 0
        ]);
    }
}
