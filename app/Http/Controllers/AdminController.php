<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SantriRegistration;
use App\Models\Pegawai;
use App\Models\SkData;
use App\Models\AktaYayasan;
use App\Models\AktaWakaf;
use App\Models\Notification;
use App\Traits\NotifiableTrait;

class AdminController extends Controller
{
    // ==================== AUTH ====================

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
                return redirect()->route('user.dashboard');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ==================== DASHBOARD ====================

    public function dashboard()
    {
        $stats = [
            'santri_pending'     => SantriRegistration::where('status', 'pending')->count(),
            'santri_total'       => SantriRegistration::count(),
            'santri_diterima'    => SantriRegistration::where('status', 'diterima')->count(),
            'santri_ditolak'     => SantriRegistration::where('status', 'ditolak')->count(),
            'pegawai_total'      => Pegawai::where('status', 'aktif')->count(),
            'sk_total'           => SkData::count(),
            'akta_yayasan_total' => AktaYayasan::count(),
            'akta_wakaf_total'   => AktaWakaf::count(),
        ];

        $santri = SantriRegistration::latest()->paginate(5);

        return view('admin.dashboard', compact('stats', 'santri'));
    }

    // ==================== SANTRI ====================

    public function santriIndex()
    {
        $santri = SantriRegistration::latest()->paginate(10);
        return view('admin.santri.index', compact('santri'));
    }

    public function santriCreate()
    {
        return view('admin.santri.create');
    }

    public function santriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable|string',
            'email'         => 'nullable|email|max:255',
            'no_wali'       => 'required|string|max:20',
            'nama_wali'     => 'required|string|max:255',
            'pekerjaan'     => 'nullable|string|max:100',
            'dok_akta'      => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:20480',
            'dok_kk'        => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:20480',
        ]);

        if ($request->hasFile('dok_kk')) {
            $validated['dok_kk'] = $request->file('dok_kk')->store('santri/kk', 'public');
        }

        if ($request->hasFile('dok_akta')) {
            $validated['dok_akta'] = $request->file('dok_akta')->store('santri/akta', 'public');
        }

        SantriRegistration::create($validated);

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil ditambahkan');
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
            'nama_lengkap'  => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable|string',
            'email'         => 'nullable|email|max:255',
            'no_wali'       => 'required|string|max:20',
            'nama_wali'     => 'required|string|max:255',
            'pekerjaan'     => 'nullable|string|max:100',
            'dok_kk'        => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:20480',
            'dok_akta'      => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:20480',
        ]);

        if ($request->hasFile('dok_kk')) {
            if ($santri->dok_kk) Storage::disk('public')->delete($santri->dok_kk);
            $validated['dok_kk'] = $request->file('dok_kk')->store('santri/kk', 'public');
        }

        if ($request->hasFile('dok_akta')) {
            if ($santri->dok_akta) Storage::disk('public')->delete($santri->dok_akta);
            $validated['dok_akta'] = $request->file('dok_akta')->store('santri/akta', 'public');
        }

        $santri->update($validated);

        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil diupdate');
    }

    public function santriDestroy($id)
    {
        $santri = SantriRegistration::findOrFail($id);

        if ($santri->dok_kk)   Storage::disk('public')->delete($santri->dok_kk);
        if ($santri->dok_akta) Storage::disk('public')->delete($santri->dok_akta);

        $santri->delete();
        return redirect()->route('admin.santri.index')->with('success', 'Data santri berhasil dihapus');
    }

    public function verify($id)
    {
        $santri = SantriRegistration::findOrFail($id);

        $santri->update([
            'status' => 'diterima',
            'alasan_penolakan' => null
        ]);

        Notification::create([
            'user_id' => $santri->user_id,
            'type' => 'santri',
            'title' => 'Pendaftaran Diterima',
            'message' => 'Selamat! Pendaftaran santri Anda telah diterima.',
            'data' => json_encode([
                'santri_id' => $santri->id
            ])
        ]);

        return back()->with('success', 'Santri berhasil diverifikasi.');
    }

   public function rejectSantri(Request $request, $id)
{
    // Validasi alasan penolakan (opsional, tergantung form Anda)
    if ($request->has('alasan_penolakan')) {
        $request->validate([
            'alasan_penolakan' => 'required|string|min:10'
        ]);
    }

    $santri = SantriRegistration::findOrFail($id);

    $santri->update([
        'status' => 'ditolak',
        'alasan_penolakan' => $request->alasan_penolakan ?? 'Pendaftaran ditolak oleh admin'
    ]);

    // Buat notifikasi jika user_id tersedia
    if ($santri->user_id) {
        Notification::create([
            'user_id' => $santri->user_id,
            'type' => 'santri',
            'title' => 'Pendaftaran Ditolak',
            'message' => 'Pendaftaran santri Anda ditolak. Alasan: ' . ($request->alasan_penolakan ?? 'Tidak ada alasan'),
            'data' => json_encode([
                'santri_id' => $santri->id
            ])
        ]);
    }

    return redirect()
        ->route('admin.santri.index')
        ->with('success', 'Santri berhasil ditolak.');
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
            // Maks 40MB = 40960 KB
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
            // Unique rule dikecualikan untuk record yang sedang di-edit
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
                // Hapus file lama jika ada
                if ($pegawai->$field) {
                    Storage::disk('public')->delete($pegawai->$field);
                }
                // Simpan file baru
                $validated[$field] = $request->file($field)->store("pegawai/{$field}", 'public');
            }
        }

        $pegawai->update($validated);

        // Redirect ke halaman detail pegawai setelah update
        return redirect()->route('admin.pegawai.show', $pegawai->id)
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function pegawaiDestroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Hapus semua file dokumen dari storage
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
            // 'file_akta' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'file_akta' => 'required|file|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
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
            'file_akta' => 'required|mimetypes:image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
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
            // 'file_sertifikat'  => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
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
            'luas_tanah'       => 'nullable|string|max:50',
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
        /** @var \App\Models\User $user */
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
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Password berhasil diubah');
    }

    public function changeEmail(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $request->validate([
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|current_password',
        ]);
        $user->update(['email' => $request->email]);
        return back()->with('success', 'Email berhasil diubah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

