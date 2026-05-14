<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BiayaPendaftaran;

class BiayaPendaftaranSeeder extends Seeder
{
    public function run()
    {
        $biaya = [
            [
                'nama_biaya' => 'Biaya Pendaftaran',
                'nominal' => 3000000,
                'keterangan' => 'Biaya pendaftaran awal tahun ajaran baru',
                'status' => 'aktif',
                'urutan' => 1
            ],
            [
                'nama_biaya' => 'Uang Masuk',
                'nominal' => 450000,
                'keterangan' => 'Uang masuk untuk santri baru',
                'status' => 'aktif',
                'urutan' => 2
            ],
            [
                'nama_biaya' => 'SPP Bulanan',
                'nominal' => 600000,
                'keterangan' => 'Sumbangan Pembinaan Pendidikan per bulan',
                'status' => 'aktif',
                'urutan' => 3
            ]
        ];

        foreach ($biaya as $item) {
            BiayaPendaftaran::create($item);
        }
    }
}