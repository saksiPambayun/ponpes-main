<?php

use App\Models\BiayaPendaftaran;

if (!function_exists('getBiayaPendaftaran')) {
    /**
     * Get all active biaya pendaftaran
     */
    function getBiayaPendaftaran()
    {
        try {
            return BiayaPendaftaran::aktif()->orderBy('urutan', 'asc')->get();
        } catch (\Exception $e) {
            return collect([]); // Return empty collection if error
        }
    }
}

if (!function_exists('getTotalBiayaPendaftaran')) {
    /**
     * Get total biaya pendaftaran
     */
    function getTotalBiayaPendaftaran()
    {
        try {
            return BiayaPendaftaran::aktif()->sum('nominal');
        } catch (\Exception $e) {
            return 0;
        }
    }
}

if (!function_exists('formatRupiah')) {
    /**
     * Format number to Rupiah
     */
    function formatRupiah($number)
    {
        return 'Rp. ' . number_format($number, 0, ',', '.');
    }
}