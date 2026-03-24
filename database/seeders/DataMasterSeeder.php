<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilYayasan;
use App\Models\StrukturOrganisasi;
use App\Models\Fasilitas;
use App\Models\Gallery;
use App\Models\Program;

class DataMasterSeeder extends Seeder
{
    public function run(): void
    {
        // Profil Yayasan
        ProfilYayasan::create([
            'nama_yayasan' => 'Yayasan Management X',
            'alamat' => 'Jl. Contoh No. 123',
            'telepon' => '08123456789',
            'email' => 'info@yayasan.com',
            'website' => 'https://yayasan.com',
            'visi' => 'Menjadi yayasan terkemuka...',
            'misi' => '1. Meningkatkan kualitas...'
        ]);

        // Struktur Organisasi
        StrukturOrganisasi::create([
            'nama_jabatan' => 'Ketua Yayasan',
            'nama_pejabat' => 'Dr. H. Ahmad, M.Pd',
            'urutan' => 1
        ]);

        // Fasilitas
        Fasilitas::create([
            'nama_fasilitas' => 'Ruang Kelas',
            'deskripsi' => 'Ruang belajar yang nyaman',
            'jumlah' => 10,
            'kondisi' => 'Baik'
        ]);

        // Program
        Program::create([
            'nama_program' => 'Program Beasiswa',
            'deskripsi' => 'Program beasiswa untuk santri berprestasi',
            'kategori' => 'pendidikan',
            'status' => 'aktif'
        ]);
    }
}