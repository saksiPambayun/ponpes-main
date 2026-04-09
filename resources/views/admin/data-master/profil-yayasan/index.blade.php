@extends('admin.layout')

@section('title', 'Profil Yayasan')@section('content')
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        {{-- PAGE HEADER --}}
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="header-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-building" style="color: #fff; font-size: 1.2rem;"></i>
                </div>
                <div>
                    <h1 class="page-title" style="font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0;">Profil
                        Yayasan</h1>
                    <nav class="breadcrumb-nav"
                        style="display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #64748b; margin-top: 4px;">
                        <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link"
                            style="color: #64748b; text-decoration: none;">Dashboard</a>
                        <i class="fas fa-chevron-right breadcrumb-sep" style="font-size: 0.6rem;"></i>
                        <span class="breadcrumb-current" style="color: #1e3a5f; font-weight: 600;">Profil Yayasan</span>
                    </nav>
                </div>
            </div>
        <a href="{{ route('admin.data-master.profil-yayasan.edit') }}"
            style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #4361ee, #7209b7); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; text-decoration: none;">
            <i class="fas fa-pencil-alt"></i> Edit Profil
        </a>
        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert-success-box"
                style="display: flex; align-items: center; gap: 10px; background: #f0fdf4; border-left: 4px solid #10b981; border-radius: 10px; padding: 12px 16px; margin-bottom: 20px;">
                <i class="fas fa-check-circle" style="color: #10b981;"></i>
                <span style="color: #15803d;">{{ session('success') }}</span>
            </div>
        @endif

        <div class="content-grid" style="display: grid; grid-template-columns: 300px 1fr; gap: 24px; align-items: start;">
            {{-- ===== KOLOM KIRI - LOGO ===== --}}
            <div class="sidebar-col">
                <div class="section-card"
                    style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-image" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Logo Yayasan</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem; text-align: center;">
                        @if($profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Yayasan"
                                style="max-width: 100%; max-height: 150px; object-fit: contain;">
                        @else
                            <div style="padding: 2rem; background: #f8fafc; border-radius: 12px; text-align: center;">
                                <i class="fas fa-building" style="font-size: 3rem; color: #cbd5e0;"></i>
                                <p style="color: #94a3b8; margin-top: 0.5rem;">Belum ada logo</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ===== KOLOM KANAN ===== --}}
            <div class="main-col" style="display: flex; flex-direction: column; gap: 20px;">
                {{-- Identitas Yayasan --}}
                <div class="section-card"
                    style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-id-card" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Identitas Yayasan</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; gap: 0.75rem;">
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #f0f4f8;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Nama
                                    Yayasan</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">{{ $profil->nama_yayasan ?? '-' }}
                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #f0f4f8;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Tahun
                                    Berdiri</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">
                                    {{ $profil->tahun_berdiri ?? '-' }}</div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Tentang
                                    Kami</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36; line-height: 1.6;">
                                    {{ $profil->deskripsi ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="section-card"
                    style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-bullseye" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Visi & Misi</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="margin-bottom: 1.5rem;">
                            <div
                                style="display: inline-block; background: #eff6ff; color: #1d4ed8; font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; margin-bottom: 10px;">
                                VISI</div>
                            <p style="font-size: 0.87rem; color: #475569; line-height: 1.6; margin: 0;">
                                {{ $profil->visi ?? '-' }}</p>
                        </div>
                        <div>
                            <div
                                style="display: inline-block; background: #f0fdf4; color: #15803d; font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; margin-bottom: 10px;">
                                MISI</div>
                            <p
                                style="font-size: 0.87rem; color: #475569; line-height: 1.6; margin: 0; white-space: pre-line;">
                                {{ $profil->misi ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Kontak & Alamat --}}
                <div class="section-card"
                    style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-map-marker-alt" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Kontak & Alamat</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; gap: 0.75rem;">
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #f0f4f8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Alamat
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">
                                    {{ $profil->alamat ?? '-' }}
                                    @if($profil->kota || $profil->provinsi)
                                        <br><span
                                            style="color: #64748b;">{{ implode(', ', array_filter([$profil->kota, $profil->provinsi, $profil->kode_pos])) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #f0f4f8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Telepon
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">{{ $profil->telepon ?? '-' }}
                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #f0f4f8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Email</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">{{ $profil->email ?? '-' }}</div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #64748b;">Website
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #1a1f36;">{{ $profil->website ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Media Sosial --}}
                <div class="section-card"
                    style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-share-alt" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Media Sosial</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #64748b; margin-bottom: 0.25rem;">
                                    <i class="fab fa-instagram" style="color: #e1306c;"></i> Instagram</div>
                                <div style="font-size: 0.85rem; color: #1a1f36;">
                                    @if($profil->instagram)
                                        <a href="https://instagram.com/{{ ltrim($profil->instagram, '@') }}" target="_blank"
                                            style="color: #4361ee; text-decoration: none;">@
                                            {{ ltrim($profil->instagram, '@') }}</a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #64748b; margin-bottom: 0.25rem;">
                                    <i class="fab fa-facebook" style="color: #1877f2;"></i> Facebook</div>
                                <div style="font-size: 0.85rem; color: #1a1f36;">{{ $profil->facebook ?? '-' }}</div>
                            </div>
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #64748b; margin-bottom: 0.25rem;">
                                    <i class="fab fa-youtube" style="color: #ff0000;"></i> YouTube</div>
                                <div style="font-size: 0.85rem; color: #1a1f36;">{{ $profil->youtube ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
