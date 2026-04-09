@extends('admin.layout')

@section('title', 'Detail Anggota Organisasi')

@section('content')
    <div class="page-wrapper" style="background: #f8fafc; min-height: 100vh; padding: 1.5rem;">

        <!-- Header -->
        <div style="margin-bottom: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 style="font-size: 1.5rem; font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">Detail Anggota
                        Organisasi</h1>
                    <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Informasi lengkap anggota struktur organisasi
                    </p>
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <a href="{{ route('admin.data-master.struktur-organisasi.edit', $anggota) }}"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: #f59e0b; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: #64748b; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">

            <!-- Card Profil (Sidebar Kiri) -->
            <div class="col-lg-4" style="flex: 1; min-width: 280px;">
                <div
                    style="background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; text-align: center; padding: 1.5rem;">
                    <!-- Foto Profil -->
                    @if($anggota->foto)
                        <div style="margin-bottom: 1rem;">
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}"
                                style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        </div>
                    @else
                        <div style="margin-bottom: 1rem;">
                            <div
                                style="width: 120px; height: 120px; background: linear-gradient(135deg, #e2e8f0, #cbd5e0); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 3px solid #e2e8f0;">
                                <i class="fas fa-user" style="color: #64748b; font-size: 2.5rem;"></i>
                            </div>
                        </div>
                    @endif

                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">
                        {{ $anggota->nama }}</h3>
                    <p style="color: #64748b; font-size: 0.85rem; margin-bottom: 1rem;">{{ $anggota->jabatan }}</p>

                    <!-- Badge Divisi & Status -->
                    <div style="display: flex; justify-content: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.7rem; font-weight: 600;
                            @if($anggota->divisi == 'pengurus') background: #eef2ff; color: #3b82f6;
                            @elseif($anggota->divisi == 'pengawas') background: #fce7f3; color: #ec489a;
                            @else background: #dcfce7; color: #22c55e; @endif">
                            {{ ucfirst($anggota->divisi) }}
                        </span>
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.7rem; font-weight: 600;
                            @if($anggota->status == 'aktif') background: #dcfce7; color: #166534;
                            @else background: #fef3c7; color: #92400e; @endif">
                            {{ $anggota->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>

                    <!-- Kontak -->
                    @if($anggota->telepon || $anggota->email)
                        <hr style="border-color: #e2e8f0; margin: 1rem 0;">
                        <div style="text-align: left;">
                            @if($anggota->telepon)
                                <p
                                    style="margin-bottom: 0.5rem; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-phone" style="color: #3b82f6; width: 20px;"></i>
                                    <span style="color: #475569;">{{ $anggota->telepon }}</span>
                                </p>
                            @endif
                            @if($anggota->email)
                                <p style="margin-bottom: 0; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-envelope" style="color: #3b82f6; width: 20px;"></i>
                                    <span style="color: #475569;">{{ $anggota->email }}</span>
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Detail Info (Sidebar Kanan) -->
            <div class="col-lg-7" style="flex: 2; min-width: 300px;">

                <!-- Informasi Detail Card -->
                <div
                    style="background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; margin-bottom: 1.5rem;">
                    <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
                        <h4 style="font-size: 0.9rem; font-weight: 600; color: #1e293b; margin: 0;">
                            <i class="fas fa-info-circle" style="color: #3b82f6; margin-right: 0.5rem;"></i>
                            Informasi Detail
                        </h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">Nama
                                    Lengkap</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #1e293b; margin: 0;">
                                    {{ $anggota->nama }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Jabatan</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #1e293b; margin: 0;">
                                    {{ $anggota->jabatan }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Divisi</p>
                                <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                    @if($anggota->divisi == 'pengurus') background: #eef2ff; color: #3b82f6;
                                    @elseif($anggota->divisi == 'pengawas') background: #fce7f3; color: #ec489a;
                                    @else background: #dcfce7; color: #22c55e; @endif">
                                    {{ ucfirst($anggota->divisi) }}
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Status</p>
                                <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                    @if($anggota->status == 'aktif') background: #dcfce7; color: #166534;
                                    @else background: #fef3c7; color: #92400e; @endif">
                                    {{ $anggota->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Urutan Tampil</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #1e293b; margin: 0;">
                                    {{ $anggota->urutan ?? 0 }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Telepon</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #1e293b; margin: 0;">
                                    {{ $anggota->telepon ?? '-' }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">Email
                                </p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #1e293b; margin: 0;">
                                    {{ $anggota->email ?? '-' }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Ditambahkan</p>
                                <p style="font-size: 0.85rem; color: #475569; margin: 0;">
                                    {{ $anggota->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">
                                    Diperbarui</p>
                                <p style="font-size: 0.85rem; color: #475569; margin: 0;">
                                    {{ $anggota->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>

                        @if($anggota->deskripsi)
                            <hr style="border-color: #e2e8f0; margin: 1rem 0;">
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0;">Deskripsi
                                </p>
                                <p style="font-size: 0.85rem; color: #475569; margin: 0; line-height: 1.5;">
                                    {{ $anggota->deskripsi }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Aksi Hapus -->
                <div style="background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden;">
                    <div
                        style="padding: 1rem 1.5rem; display: flex; justify-content: flex-end; gap: 0.75rem; flex-wrap: wrap;">
                        <form action="{{ route('admin.data-master.struktur-organisasi.destroy', $anggota) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus anggota {{ $anggota->nama }}?')"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="display: inline-flex; align-items: center; gap: 0.5rem; background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 8px; border: none; cursor: pointer; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;"
                                onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                                <i class="fas fa-trash"></i> Hapus Anggota
                            </button>
                        </form>
                        <a href="{{ route('admin.data-master.struktur-organisasi.edit', $anggota) }}"
                            style="display: inline-flex; align-items: center; gap: 0.5rem; background: #f59e0b; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                            <i class="fas fa-edit"></i> Edit Anggota
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            .page-wrapper {
                padding: 1rem !important;
            }

            .row {
                flex-direction: column;
            }

            .col-lg-4,
            .col-lg-7 {
                width: 100%;
            }
        }
    </style>
@endsection
