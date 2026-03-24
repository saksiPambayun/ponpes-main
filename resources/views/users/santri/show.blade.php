{{-- resources/views/users/santri/show.blade.php --}}
@extends('layouts.user')

@section('title', 'Detail Santri')

@section('content')
    <div class="mb-4">
        <a href="{{ route('user.santri.index') }}" class="btn btn-sm btn-outline-secondary mb-2">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        <h4 class="fw-bold mb-0">Detail Pendaftaran</h4>
    </div>

    {{-- Status Banner --}}
    @if($santri->status === 'pending')
        <div class="alert alert-warning d-flex align-items-center gap-3 mb-4">
            <i class="fas fa-clock fa-2x"></i>
            <div>
                <strong>Status: Menunggu Verifikasi</strong><br>
                <small>Pendaftaran Anda sedang dalam proses review oleh admin. Mohon tunggu konfirmasi.</small>
            </div>
        </div>
    @elseif($santri->status === 'diterima')
        <div class="alert alert-success d-flex align-items-center gap-3 mb-4">
            <i class="fas fa-check-circle fa-2x"></i>
            <div>
                <strong>Status: Diterima ✓</strong><br>
                <small>Selamat! Pendaftaran telah diverifikasi dan diterima oleh admin.</small>
            </div>
        </div>
    @else
        <div class="alert alert-danger d-flex align-items-center gap-3 mb-4">
            <i class="fas fa-times-circle fa-2x"></i>
            <div>
                <strong>Status: Ditolak</strong><br>
                @if($santri->alasan_penolakan)
                    <small>Alasan: {{ $santri->alasan_penolakan }}</small>
                @endif
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-user me-2 text-primary"></i>Data Santri
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted" width="40%">Nama Lengkap</td>
                            <td><strong>{{ $santri->nama_lengkap }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">NISN</td>
                            <td>{{ $santri->nisn ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Asal Sekolah</td>
                            <td>{{ $santri->asal_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Tanggal Lahir</td>
                            <td>{{ $santri->tanggal_lahir ? \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Email</td>
                            <td>{{ $santri->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Alamat</td>
                            <td>{{ $santri->alamat ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-users me-2 text-primary"></i>Data Wali
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted" width="40%">Nama Wali</td>
                            <td><strong>{{ $santri->nama_wali ?? '-' }}</strong></td>
                        </tr>
                        <tr>
                            <td class="text-muted">No. HP Wali</td>
                            <td>{{ $santri->no_wali ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Pekerjaan</td>
                            <td>{{ $santri->pekerjaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Tanggal Daftar</td>
                            <td>{{ $santri->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Dokumen --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-paperclip me-2 text-primary"></i>Dokumen
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <span class="text-muted small">Kartu Keluarga:</span><br>
                        @if($santri->dok_kk)
                            <a href="{{ Storage::url($santri->dok_kk) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary mt-1">
                                <i class="fas fa-file me-1"></i> Lihat Dokumen
                            </a>
                        @else
                            <span class="text-muted small">Tidak ada</span>
                        @endif
                    </div>
                    <div>
                        <span class="text-muted small">Akta Lahir:</span><br>
                        @if($santri->dok_akta)
                            <a href="{{ Storage::url($santri->dok_akta) }}" target="_blank"
                                class="btn btn-sm btn-outline-primary mt-1">
                                <i class="fas fa-file me-1"></i> Lihat Dokumen
                            </a>
                        @else
                            <span class="text-muted small">Tidak ada</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($santri->status === 'pending')
        <div class="d-flex gap-2 mt-2">
            <a href="{{ route('user.santri.edit', $santri->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit Data
            </a>
            <form method="POST" action="{{ route('user.santri.destroy', $santri->id) }}"
                onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    @endif
@endsection
