<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SantriRegistration;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function verify($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        $santri->status = 'diterima';
        $santri->alasan_penolakan = null;
        $santri->save();

        return redirect()->back()->with('success', 'Santri berhasil diverifikasi dan diterima.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|min:10'
        ]);

        $santri = SantriRegistration::findOrFail($id);
        $santri->status = 'ditolak';
        $santri->alasan_penolakan = $request->alasan_penolakan;
        $santri->save();

        return redirect()->back()->with('success', 'Santri berhasil ditolak.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'action' => 'required|in:terima,tolak,hapus'
        ]);

        if ($request->action == 'terima') {
            SantriRegistration::whereIn('id', $request->ids)->update(['status' => 'diterima', 'alasan_penolakan' => null]);
            $message = 'Santri terpilih berhasil diterima.';
        } elseif ($request->action == 'tolak') {
            SantriRegistration::whereIn('id', $request->ids)->update([
                'status' => 'ditolak',
                'alasan_penolakan' => 'Ditolak melalui bulk action.'
            ]);
            $message = 'Santri terpilih berhasil ditolak.';
        } elseif ($request->action == 'hapus') {
            SantriRegistration::whereIn('id', $request->ids)->delete();
            $message = 'Santri terpilih berhasil dihapus.';
        }

        return redirect()->back()->with('success', $message);
    }
}