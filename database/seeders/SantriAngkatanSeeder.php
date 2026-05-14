<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SantriRegistration;
use Carbon\Carbon;

class SantriAngkatanSeeder extends Seeder
{
    public function run()
    {
        // Data untuk angkatan 2026
        SantriRegistration::create([
            'nama_lengkap' => 'Ahmad Rizki',
            'jenis_kelamin' => 'Laki-laki',
            'nisn' => '1234567890',
            'asal_sekolah' => 'SMP Negeri 1 Jakarta',
            'status' => 'diterima',
            'angkatan' => 2026,
            'created_at' => Carbon::create(2026, 1, 15),
        ]);

        // Data untuk angkatan 2027
        SantriRegistration::create([
            'nama_lengkap' => 'Siti Aisyah',
            'jenis_kelamin' => 'Perempuan',
            'nisn' => '1234567891',
            'asal_sekolah' => 'SMP Negeri 2 Bandung',
            'status' => 'diterima',
            'angkatan' => 2027,
            'created_at' => Carbon::create(2027, 1, 20),
        ]);

        // Data untuk angkatan 2028
        SantriRegistration::create([
            'nama_lengkap' => 'Muhammad Fadil',
            'jenis_kelamin' => 'Laki-laki',
            'nisn' => '1234567892',
            'asal_sekolah' => 'SMP Islam Al-Azhar',
            'status' => 'diterima',
            'angkatan' => 2028,
            'created_at' => Carbon::create(2028, 2, 10),
        ]);
    }
}
