<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Santri;
use App\Models\SantriRegistration;
use App\Models\Pegawai;
use App\Models\SkData;
use App\Models\AktaYayasan;
use App\Models\AktaWakaf;
use App\Models\Gallery;
use App\Models\Notification;
use App\Models\Feedback;
use App\Traits\NotifiableTrait;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    // HAPUS atau COMMENT constructor ini!
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (!Auth::check()) {
    //             return redirect()->route('login');
    //         }
    //
    //         $user = Auth::user();
    //
    //         if ($user->role !== 'admin' && $user->role !== 'superadmin') {
    //             return redirect()->route('home')->with('error', 'Akses ditolak.');
    //         }
    //
    //         return $next($request);
    //     });
    // }



    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // kalau admin
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // kalau user
            if ($user->role == 'user') {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ==================== DASHBOARD ====================

    public function dashboard()
    {
        \Log::info('Dashboard method called', [
        'user_id' => auth()->id(),
        'user_role' => auth()->user()->role ?? 'none'
    ]);
    
        $stats = [
            'santri_pending'     => SantriRegistration::where('status', 'pending')->count(),
            'santri_total'       => SantriRegistration::count(),
            'santri_diterima'    => SantriRegistration::where('status', 'diterima')->count(),
            'santri_ditolak'     => SantriRegistration::where('status', 'ditolak')->count(),
            'pegawai_total'      => Pegawai::where('status', 'aktif')->count(),
            'sk_total'           => SkData::count(),
            'akta_yayasan_total' => AktaYayasan::count(),
            'akta_wakaf_total'   => AktaWakaf::count(),
            'feedback_unread'    => Feedback::where('is_read', false)->count(),
        ];

        $santri = SantriRegistration::latest()->paginate(5);

        return view('admin.dashboard', compact('stats', 'santri'));
    }

    // ==================== SANTRI ====================

    public function santriIndex()
    {
        // Data untuk tab Pendaftar (pending)
        $santriPending = SantriRegistration::where('status', 'pending')
            ->with('wave')
            ->latest()
            ->paginate(10);

        // Data untuk tab Diterima
        $santriDiterima = SantriRegistration::where('status', 'diterima')
            ->with('wave')
            ->latest()
            ->paginate(10);

        // Data untuk tab Ditolak
        $santriDitolak = SantriRegistration::where('status', 'ditolak')
            ->with('wave')
            ->latest()
            ->paginate(10);

        // Statistik untuk badge
        $stats = [
            'pending' => SantriRegistration::where('status', 'pending')->count(),
            'diterima' => SantriRegistration::where('status', 'diterima')->count(),
            'ditolak' => SantriRegistration::where('status', 'ditolak')->count(),
        ];

        // Untuk filter gelombang
        $waves = \App\Models\RegistrationWave::all();

        // Untuk filter angkatan (tahun dari created_at)
        $angkatanList = SantriRegistration::where('status', 'diterima')
            ->selectRaw('YEAR(created_at) as tahun')
            ->distinct()
            ->pluck('tahun');

        return view('admin.santri.index', compact(
            'santriPending',
            'santriDiterima',
            'santriDitolak',
            'stats',
            'waves',
            'angkatanList'
        ));
    }

    public function santriCreate()
    {
        return view('admin.santri.create');
    }

    public function santriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nisn'            => 'nullable|string|max:50',
            'asal_sekolah'    => 'required|string|max:255',
            'tanggal_lahir'   => 'nullable|date',
            'alamat'          => 'nullable|string',
            'email'           => 'nullable|email|max:255',
            'no_wali'         => 'required|string|max:20',
            'nama_wali'       => 'required|string|max:255',
            'pekerjaan_wali'  => 'nullable|string|max:100',
            'wave_id'         => 'nullable|exists:registration_waves,id',
            'foto'            => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'kk'              => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
        ]);

        $data = $validated;

        unset($data['foto'], $data['kk']);

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('santri/kk', 'public');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('santri/foto', 'public');
        }

        $data['status'] = 'pending';
        $data['acceptance_status'] = 'pending';

        if (isset($data['wave_id'])) {
            $wave = \App\Models\RegistrationWave::find($data['wave_id']);
            if ($wave) {
                $wave->increment('registered_count');
            }
        }

        SantriRegistration::create($data);

        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Pendaftaran berhasil!']);
        }

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil ditambahkan!');
    }

    public function santriShow($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        return view('admin.santri.show', compact('santri'));
    }

    public function santriEdit($id)
    {
        $santri = SantriRegistration::findOrFail($id);
        return view('admin.santri.edit', compact('santri'));
    }

    public function santriUpdate(Request $request, $id)
    {
        $santri = SantriRegistration::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'nisn'              => 'nullable|string|max:50',
            'asal_sekolah'      => 'required|string|max:255',
            'tanggal_lahir'     => 'nullable|date',
            'alamat'            => 'nullable|string',
            'email'             => 'nullable|email|max:255',
            'no_wali'           => 'required|string|max:20',
            'nama_wali'         => 'required|string|max:255',
            'pekerjaan_wali'    => 'nullable|string|max:100',
            'kk'                => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'foto'              => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $validated;

        unset($data['foto'], $data['kk']);

        if ($request->hasFile('kk')) {
            try {
                if ($santri->kk && Storage::disk('public')->exists($santri->kk)) {
                    Storage::disk('public')->delete($santri->kk);
                }
                $data['kk'] = $request->file('kk')->store('santri/kk', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['kk' => 'Gagal upload KK: ' . $e->getMessage()]);
            }
        }

        if ($request->hasFile('foto')) {
            try {
                if ($santri->foto && Storage::disk('public')->exists($santri->foto)) {
                    Storage::disk('public')->delete($santri->foto);
                }
                $data['foto'] = $request->file('foto')->store('santri/foto', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['foto' => 'Gagal upload foto: ' . $e->getMessage()]);
            }
        }

        $santri->update($data);

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil diupdate');
    }

    public function santriDestroy($id)
    {
        $santri = SantriRegistration::findOrFail($id);

        if ($santri->kk) {
            Storage::disk('public')->delete($santri->kk);
        }
        if ($santri->foto) {
            Storage::disk('public')->delete($santri->foto);
        }

        $santri->delete();

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil dihapus');
    }

   public function verifySantri($id)
{
    try {
        $santri = SantriRegistration::findOrFail($id);

        $santri->update([
            'status' => 'diterima',
            'acceptance_status' => 'accepted',
            'tanggal_verifikasi' => now(),
        ]);

        if (request()->ajax() || request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Santri berhasil diterima!'
            ]);
        }

        return redirect()->back()->with('success', 'Santri berhasil diterima!');

    } catch (\Exception $e) {
        if (request()->ajax() || request()->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menerima santri: ' . $e->getMessage()
            ], 500);
        }
        return redirect()->back()->with('error', 'Gagal menerima santri');
    }
}

public function rejectSantri(Request $request, $id)
{
    try {
        $request->validate([
            'alasan_penolakan' => 'required|string|min:10'
        ]);

        $santri = SantriRegistration::findOrFail($id);

        $santri->update([
            'status' => 'ditolak',
            'acceptance_status' => 'rejected',
            'alasan_penolakan' => $request->alasan_penolakan,
            'tanggal_verifikasi' => now(),
        ]);

        if (request()->ajax() || request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran santri ditolak.'
            ]);
        }

        return redirect()->back()->with('success', 'Pendaftaran santri ditolak.');

    } catch (\Exception $e) {
        if (request()->ajax() || request()->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menolak santri: ' . $e->getMessage()
            ], 500);
        }
        return redirect()->back()->with('error', 'Gagal menolak santri');
    }
}

 // ==================== FEEDBACK (KRITIK & SARAN) ====================

    public function feedbackIndex(Request $request)
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')
            ->paginate(10);
        $unreadCount = Feedback::where('is_read', false)->count();

        return view('admin.feedback.index', compact('feedbacks', 'unreadCount'));
    }

    public function feedbackShow($id)
{
    // Debug: cek apakah fungsi dipanggil
    \Log::info('feedbackShow dipanggil dengan ID: ' . $id);

    $feedback = Feedback::findOrFail($id);

    // Debug: cek apakah feedback ditemukan
    \Log::info('Feedback ditemukan: ' . $feedback->name);

    if (!$feedback->is_read) {
        $feedback->markAsRead();
    }

    return view('admin.feedback.show', compact('feedback'));
}

    public function feedbackDestroy($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();

            return redirect()->route('admin.feedback.index')
                ->with('success', 'Masukan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.feedback.index')
                ->with('error', 'Gagal menghapus masukan!');
        }
    }

    public function feedbackMarkAllRead()
    {
        Feedback::where('is_read', false)->update(['is_read' => true]);

        return redirect()->route('admin.feedback.index')
            ->with('success', 'Semua masukan telah ditandai dibaca!');
    }

    public function feedbackMarkAsRead($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->markAsRead();

        return response()->json(['success' => true]);
    }

    public function feedbackUnreadCount()
    {
        $count = Feedback::where('is_read', false)->count();

        return response()->json(['unread_count' => $count]);
    }

    // Method baru untuk reply via WhatsApppublic function feedbackReplyWhatsApp(Request $request, $id)
public function feedbackReplyWhatsApp(Request $request, $id)
{
    $request->validate([
        'reply_message' => 'required|string|min:5|max:1000',
    ]);

    $feedback = Feedback::findOrFail($id);

    if (!$feedback->hasPhoneNumber()) {
        return redirect()->route('admin.feedback.show', $feedback->id)
            ->with('error', 'Pengirim tidak mencantumkan nomor telepon!');
    }

    $whatsappService = new WhatsAppService();
    $formattedPhone = $feedback->getFormattedPhone();

    // Panggil method sendReplyTemplate dari WhatsAppService
    $message = $whatsappService->sendReplyTemplate(
        $feedback->name,
        $request->reply_message,
        $feedback->message
    );

    $result = $whatsappService->sendMessage($formattedPhone, $message);

    $updateData = [
        'is_replied' => true,
        'reply_message' => $request->reply_message,
        'replied_at' => now(),
        'replied_by' => Auth::id(),
    ];

    if (Schema::hasColumn('feedbacks', 'whatsapp_reply')) {
        $updateData['whatsapp_reply'] = $message;
        $updateData['whatsapp_replied_at'] = now();
        $updateData['whatsapp_reply_status'] = $result['success'] ? 'sent' : 'failed';
    }

    $feedback->update($updateData);

    if ($result['success']) {
        return redirect()->route('admin.feedback.show', $feedback->id)
            ->with('success', 'Balasan berhasil dikirim via WhatsApp!');
    }

    return redirect()->route('admin.feedback.show', $feedback->id)
        ->with('error', 'Gagal kirim: ' . ($result['error'] ?? 'Unknown error'));
}
/**
 * Cek status WhatsApp
 */
public function checkWhatsAppStatus()
{
    $whatsappService = new \App\Services\WhatsAppService();
    $status = $whatsappService->checkConnection();
    return response()->json($status);
}

    // ==================== PEGAWAI ====================

    public function pegawaiIndex(Request $request)
    {
        $query = Pegawai::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pegawai         = $query->latest()->paginate(10)->withQueryString();
        $totalPegawai    = Pegawai::count();
        $pegawaiAktif    = Pegawai::where('status', 'aktif')->count();
        $pegawaiCuti     = Pegawai::where('status', 'cuti')->count();
        $pegawaiNonaktif = Pegawai::where('status', 'nonaktif')->count();

        return view('admin.pegawai.index', compact(
            'pegawai',
            'totalPegawai',
            'pegawaiAktif',
            'pegawaiCuti',
            'pegawaiNonaktif'
        ));
    }

    public function pegawaiCreate()
    {
        return view('admin.pegawai.create');
    }

    public function pegawaiStore(Request $request)
    {
        $validated = $request->validate([
            'nip'               => 'required|string|max:50|unique:pegawai,nip',
            'nama'              => 'required|string|max:255',
            'email'             => 'nullable|email|max:255|unique:pegawai,email',
            'no_telepon'        => 'nullable|string|max:20',
            'jabatan'           => 'nullable|string|max:100',
            'divisi'            => 'nullable|string|max:100',
            'status'            => 'required|in:aktif,cuti,nonaktif',
            'tipe_pegawai'      => 'required|in:tetap,kontrak,magang,honorer',
            'tanggal_bergabung' => 'nullable|date',
            'tempat_lahir'      => 'nullable|string|max:100',
            'tanggal_lahir'     => 'nullable|date',
            'jenis_kelamin'     => 'nullable|in:L,P',
            'agama'             => 'nullable|string|max:50',
            'alamat'            => 'nullable|string',
            'foto_ktp'          => 'nullable|image|mimes:jpg,jpeg,png|max:40960',
            'foto_npwp'         => 'nullable|image|mimes:jpg,jpeg,png|max:40960',
            'foto_ijazah'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:40960',
        ]);

        foreach (['foto_ktp', 'foto_npwp', 'foto_ijazah'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store("pegawai/{$field}", 'public');
            }
        }

        Pegawai::create($validated);

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function pegawaiShow($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.show', compact('pegawai'));
    }

    public function pegawaiEdit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    public function pegawaiUpdate(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nip'               => "required|string|max:50|unique:pegawai,nip,{$id}",
            'nama'              => 'required|string|max:255',
            'email'             => "nullable|email|max:255|unique:pegawai,email,{$id}",
            'no_telepon'        => 'nullable|string|max:20',
            'jabatan'           => 'nullable|string|max:100',
            'divisi'            => 'nullable|string|max:100',
            'status'            => 'required|in:aktif,cuti,nonaktif',
            'tipe_pegawai'      => 'required|in:tetap,kontrak,magang,honorer',
            'tanggal_bergabung' => 'nullable|date',
            'tempat_lahir'      => 'nullable|string|max:100',
            'tanggal_lahir'     => 'nullable|date',
            'jenis_kelamin'     => 'nullable|in:L,P',
            'agama'             => 'nullable|string|max:50',
            'alamat'            => 'nullable|string',
            'foto_ktp'          => 'nullable|image|mimes:jpg,jpeg,png|max:40960',
            'foto_npwp'         => 'nullable|image|mimes:jpg,jpeg,png|max:40960',
            'foto_ijazah'       => 'nullable|mimes:jpg,jpeg,png,pdf|max:40960',
        ]);

        foreach (['foto_ktp', 'foto_npwp', 'foto_ijazah'] as $field) {
            if ($request->hasFile($field)) {
                if ($pegawai->$field) {
                    Storage::disk('public')->delete($pegawai->$field);
                }
                $validated[$field] = $request->file($field)->store("pegawai/{$field}", 'public');
            }
        }

        $pegawai->update($validated);

        return redirect()->route('admin.pegawai.show', $pegawai->id)
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }
    public function pegawaiDestroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        foreach (['foto_ktp', 'foto_npwp', 'foto_ijazah'] as $field) {
            if ($pegawai->$field) {
                Storage::disk('public')->delete($pegawai->$field);
            }
        }

        $pegawai->delete();

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }

    // ==================== SK ====================

    public function skIndex()
    {
        $sk = SkData::latest()->paginate(10);
        return view('admin.sk.index', compact('sk'));
    }

    public function skCreate()
    {
        return view('admin.sk.create');
    }

    public function skStore(Request $request)
    {
        $validated = $request->validate([
            'nomor_sk'   => 'required|string|max:100',
            'tentang'    => 'nullable|string|max:255',
            'tanggal_sk' => 'nullable|date',
            'judul' => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'file_sk'    => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_sk')) {
            $validated['file_sk'] = $request->file('file_sk')->store('sk', 'public');
        }
        SkData::create($validated);
        return redirect()->route('admin.sk.index')->with('success', 'Data SK berhasil ditambahkan');
    }

    public function skShow($id)
    {
        return view('admin.sk.show', ['sk' => SkData::findOrFail($id)]);
    }

    public function skEdit($id)
    {
        return view('admin.sk.edit', ['sk' => SkData::findOrFail($id)]);
    }

    public function skUpdate(Request $request, $id)
    {
        $sk = SkData::findOrFail($id);
        $validated = $request->validate([
            'nomor_sk'   => 'required|string|max:100',
            'tentang'    => 'nullable|string|max:255',
            'tanggal_sk' => 'nullable|date',
            'judul' => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'file_sk'    => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_sk')) {
            if ($sk->file_sk) Storage::disk('public')->delete($sk->file_sk);
            $validated['file_sk'] = $request->file('file_sk')->store('sk', 'public');
        }
        $sk->update($validated);
        return redirect()->route('admin.sk.index')->with('success', 'Data SK berhasil diupdate');
    }

    public function skDestroy($id)
    {
        $sk = SkData::findOrFail($id);
        if ($sk->file_sk) Storage::disk('public')->delete($sk->file_sk);
        $sk->delete();
        return redirect()->route('admin.sk.index')->with('success', 'Data SK berhasil dihapus');
    }

    // ==================== AKTA YAYASAN ====================

    public function aktaYayasanIndex()
    {
        return view('admin.akta-yayasan.index', ['aktaYayasan' => AktaYayasan::latest()->paginate(10)]);
    }

    public function aktaYayasanCreate()
    {
        return view('admin.akta-yayasan.create');
    }

    public function aktaYayasanStore(Request $request)
    {
        $validated = $request->validate([
            'nomor_akta'  => 'nullable|string|max:100',
            'tanggal_akta' => 'nullable|date',
            'notaris'     => 'nullable|string|max:255',
            'judul' => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'file_akta'   => 'required|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_akta')) {
            $validated['file_akta'] = $request->file('file_akta')->store('akta-yayasan', 'public');
        }
        AktaYayasan::create($validated);
        return redirect()->route('admin.akta-yayasan.index')->with('success', 'Data Akta Yayasan berhasil ditambahkan');
    }

    public function aktaYayasanShow($id)
    {
        return view('admin.akta-yayasan.show', ['aktaYayasan' => AktaYayasan::findOrFail($id)]);
    }

    public function aktaYayasanEdit($id)
    {
        return view('admin.akta-yayasan.edit', ['aktaYayasan' => AktaYayasan::findOrFail($id)]);
    }

    public function aktaYayasanUpdate(Request $request, $id)
    {
        $aktaYayasan = AktaYayasan::findOrFail($id);
        $validated = $request->validate([
            'nomor_akta'  => 'nullable|string|max:100',
            'tanggal_akta' => 'nullable|date',
            'notaris'     => 'nullable|string|max:255',
            'judul' => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'file_akta'   => 'required|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_akta')) {
            if ($aktaYayasan->file_akta) Storage::disk('public')->delete($aktaYayasan->file_akta);
            $validated['file_akta'] = $request->file('file_akta')->store('akta-yayasan', 'public');
        }
        $aktaYayasan->update($validated);
        return redirect()->route('admin.akta-yayasan.index')->with('success', 'Data Akta Yayasan berhasil diupdate');
    }

    public function aktaYayasanDestroy($id)
    {
        $a = AktaYayasan::findOrFail($id);
        if ($a->file_akta) Storage::disk('public')->delete($a->file_akta);
        $a->delete();
        return redirect()->route('admin.akta-yayasan.index')->with('success', 'Data Akta Yayasan berhasil dihapus');
    }

    // ==================== AKTA WAKAF ====================

    public function aktaWakafIndex()
    {
        return view('admin.akta-wakaf.index', ['aktaWakaf' => AktaWakaf::latest()->paginate(10)]);
    }

    public function aktaWakafCreate()
    {
        return view('admin.akta-wakaf.create');
    }

    public function aktaWakafStore(Request $request)
    {
        $validated = $request->validate([
            'nomor_sertifikat' => 'nullable|string|max:100',
            'nazhir'           => 'nullable|string|max:255',
            'lokasi_tanah'     => 'nullable|string|max:255',
            'luas_tanah'       => 'nullable|string|max:50',
            'judul' => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'file_sertifikat' => 'required|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_sertifikat')) {
            $validated['file_sertifikat'] = $request->file('file_sertifikat')->store('akta-wakaf', 'public');
        }
        AktaWakaf::create($validated);
        return redirect()->route('admin.akta-wakaf.index')->with('success', 'Data Akta Wakaf berhasil ditambahkan');
    }

    public function aktaWakafShow($id)
    {
        return view('admin.akta-wakaf.show', ['aktaWakaf' => AktaWakaf::findOrFail($id)]);
    }

    public function aktaWakafEdit($id)
    {
        return view('admin.akta-wakaf.edit', ['aktaWakaf' => AktaWakaf::findOrFail($id)]);
    }

    public function aktaWakafUpdate(Request $request, $id)
    {
        $aktaWakaf = AktaWakaf::findOrFail($id);
        $validated = $request->validate([
            'nomor_sertifikat' => 'nullable|string|max:100',
            'nazhir'           => 'nullable|string|max:255',
            'lokasi_tanah'     => 'nullable|string|max:255',
            'judul' => 'nullable|string|max:255',
            'luas_tanah'       => 'nullable|string|max:50',
            'deskripsi'   => 'nullable|string',
            'file_sertifikat' => 'required|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        ]);
        if ($request->hasFile('file_sertifikat')) {
            if ($aktaWakaf->file_sertifikat) Storage::disk('public')->delete($aktaWakaf->file_sertifikat);
            $validated['file_sertifikat'] = $request->file('file_sertifikat')->store('akta-wakaf', 'public');
        }
        $aktaWakaf->update($validated);
        return redirect()->route('admin.akta-wakaf.index')->with('success', 'Data Akta Wakaf berhasil diupdate');
    }

    public function aktaWakafDestroy($id)
    {
        $a = AktaWakaf::findOrFail($id);
        if ($a->file_sertifikat) Storage::disk('public')->delete($a->file_sertifikat);
        $a->delete();
        return redirect()->route('admin.akta-wakaf.index')->with('success', 'Data Akta Wakaf berhasil dihapus');
    }

    // ==================== PROFILE ====================

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->update($request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]));
        return back()->with('success', 'Profil berhasil diupdate');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah');
    }

    public function changeEmail(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $request->validate([
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|current_password',
        ]);
        $user->update(['email' => $request->email]);
        return back()->with('success', 'Email berhasil diubah');
    }

    // ==================== DATA SANTRI (CALON SANTRI) ====================
 public function dataSantri(Request $request)
{
    // Data santri yang sudah diterima (status = 'diterima')
    $query = SantriRegistration::where('status', 'diterima')->with('wave');

    // Filter gelombang
    if ($request->filled('wave_id')) {
        $query->where('wave_id', $request->wave_id);
    }

    // Filter angkatan (tahun)
    if ($request->filled('angkatan')) {
        $query->whereYear('created_at', $request->angkatan);
    }

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('nisn', 'like', "%{$search}%")
              ->orWhere('asal_sekolah', 'like', "%{$search}%");
        });
    }

    $santriTetap = $query->latest()->paginate(10)->withQueryString();

    // Statistik lengkap (hitung dari database)
    $totalSantri = SantriRegistration::where('status', 'diterima')->count();

    // Jika kolom jenis_kelamin belum ada, set default 0
    try {
        $lakiLaki = SantriRegistration::where('status', 'diterima')->where('jenis_kelamin', 'L')->count();
        $perempuan = SantriRegistration::where('status', 'diterima')->where('jenis_kelamin', 'P')->count();
    } catch (\Exception $e) {
        $lakiLaki = 0;
        $perempuan = 0;
    }

    $stats = [
        'total' => $totalSantri,
        'laki_laki' => $lakiLaki,
        'perempuan' => $perempuan,
    ];

    // Data untuk filter
    $waves = \App\Models\RegistrationWave::all();
    $angkatanList = SantriRegistration::where('status', 'diterima')
        ->selectRaw('YEAR(created_at) as tahun')
        ->distinct()
        ->orderBy('tahun', 'desc')
        ->pluck('tahun');

    return view('admin.santri.data-santri', compact('santriTetap', 'stats', 'waves', 'angkatanList'));
}

// ==================== DATA PENDAFTAR (CALON SANTRI) ====================

public function dataPendaftar(Request $request)
{
    // Data pendaftar (status pending, ditolak, atau belum diterima)
    $query = SantriRegistration::with('wave');

    // Filter berdasarkan status
    $statusFilter = $request->status ?? 'pending';
    if (in_array($statusFilter, ['pending', 'diterima', 'ditolak'])) {
        $query->where('status', $statusFilter);
    } else {
        $query->where('status', 'pending'); // default pending
    }

    // Filter gelombang
    if ($request->filled('wave_id')) {
        $query->where('wave_id', $request->wave_id);
    }

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('nisn', 'like', "%{$search}%")
              ->orWhere('asal_sekolah', 'like', "%{$search}%")
              ->orWhere('no_wali', 'like', "%{$search}%");
        });
    }

    $pendaftar = $query->latest()->paginate(10)->withQueryString();

    // Statistik untuk badge
    $stats = [
        'pending' => SantriRegistration::where('status', 'pending')->count(),
        'diterima' => SantriRegistration::where('status', 'diterima')->count(),
        'ditolak' => SantriRegistration::where('status', 'ditolak')->count(),
    ];

    // Data untuk filter
    $waves = \App\Models\RegistrationWave::all();
    $currentStatus = $statusFilter;

    return view('admin.santri.data-pendaftar', compact('pendaftar', 'stats', 'waves', 'currentStatus'));
}

}
