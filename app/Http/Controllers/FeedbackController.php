<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function sendFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|min:10',
        ]);

        $profil = \App\Models\ProfilYayasan::first();
        $pondokEmail = $profil->email ?? 'pondok@al-ifadah.com';

        // Data untuk email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        // Kirim email
        Mail::send('emails.feedback', $data, function($message) use ($pondokEmail) {
            $message->to($pondokEmail)
                    ->subject('Kritik & Saran dari Website');
        });

        return redirect()->back()->with('success', 'Terima kasih! Kritik dan saran Anda telah terkirim.');
    }
}
