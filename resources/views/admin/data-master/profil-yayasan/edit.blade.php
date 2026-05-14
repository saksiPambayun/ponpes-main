@extends('admin.layout')

@section('title', 'Edit Profil Yayasan')

@section('content')
    <div class="container-fluid px-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1 fw-bold text-dark">Edit Profil Yayasan</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"
                                style="color: #005F02;">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.data-master.profil-yayasan') }}" class="text-decoration-none"
                                style="color: #005F02;">Profil Yayasan</a>
                        </li>
                        <li class="breadcrumb-item active text-muted">Edit</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.data-master.profil-yayasan') }}" class="btn btn-outline-secondary"
                style="border-color: #dfe8d8; color: #2d2d2d; border-radius: 10px;">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        {{-- Error Summary --}}
        @if($errors->any())
            <div class="alert alert-dismissible fade show shadow-sm" role="alert"
                style="background: #eef3ec; border-left: 4px solid #005F02; border-radius: 12px;">
                <i class="fas fa-exclamation-circle me-2" style="color: #005F02;"></i>
                <strong style="color: #0d4f14;">Terdapat beberapa kesalahan:</strong>
                <ul class="mb-0 mt-1 ps-3" style="color: #2d2d2d;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.data-master.profil-yayasan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                {{-- ===== KOLOM KIRI ===== --}}
                <div class="col-lg-8">

                    {{-- Identitas --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-id-card me-2"></i>Identitas Yayasan
                        </div>
                        <div class="card-body py-3" style="background: #ffffff;">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">
                                        Nama Yayasan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_yayasan"
                                        class="form-control @error('nama_yayasan') is-invalid @enderror"
                                        value="{{ old('nama_yayasan', $profil->nama_yayasan ?? '') }}"
                                        placeholder="Contoh: Yayasan Peduli Bangsa"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('nama_yayasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri"
                                        class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                        value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                                        placeholder="Contoh: 2010" min="1900" max="{{ date('Y') }}"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Tentang Kami</label>
                                    <textarea name="deskripsi" rows="3"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Deskripsi tentang yayasan..."
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Visi & Misi --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-bullseye me-2"></i>Visi & Misi
                        </div>
                        <div class="card-body py-3" style="background: #ffffff;">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Visi</label>
                                    <textarea name="visi" rows="3" class="form-control @error('visi') is-invalid @enderror"
                                        placeholder="Visi yayasan..."
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('visi', $profil->visi ?? '') }}</textarea>
                                    @error('visi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Misi</label>
                                    <small class="text-muted d-block mb-1" style="color: #2d2d2d !important;">Bisa ditulis
                                        per baris untuk setiap poin misi.</small>
                                    <textarea name="misi" rows="5" class="form-control @error('misi') is-invalid @enderror"
                                        placeholder="Misi yayasan (bisa ditulis per baris)..."
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('misi', $profil->misi ?? '') }}</textarea>
                                    @error('misi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Kontak & Alamat --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-map-marker-alt me-2"></i>Kontak & Alamat
                        </div>
                        <div class="card-body py-3" style="background: #ffffff;">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Alamat Lengkap</label>
                                    <input type="text" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        value="{{ old('alamat', $profil->alamat ?? '') }}"
                                        placeholder="Jl. Contoh No. 1, Kelurahan, Kecamatan"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Kota</label>
                                    <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror"
                                        value="{{ old('kota', $profil->kota ?? '') }}" placeholder="Contoh: Surabaya"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('kota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Provinsi</label>
                                    <input type="text" name="provinsi"
                                        class="form-control @error('provinsi') is-invalid @enderror"
                                        value="{{ old('provinsi', $profil->provinsi ?? '') }}"
                                        placeholder="Contoh: Jawa Timur"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Kode Pos</label>
                                    <input type="text" name="kode_pos"
                                        class="form-control @error('kode_pos') is-invalid @enderror"
                                        value="{{ old('kode_pos', $profil->kode_pos ?? '') }}" placeholder="Contoh: 60111"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('kode_pos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Telepon</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: #eef3ec; border-color: #dfe8d8; border-radius: 10px 0 0 10px;"><i
                                                class="fas fa-phone" style="color: #005F02;"></i></span>
                                        <input type="text" name="telepon"
                                            class="form-control @error('telepon') is-invalid @enderror"
                                            value="{{ old('telepon', $profil->telepon ?? '') }}" placeholder="031-12345678"
                                            style="border-color: #dfe8d8; border-radius: 0 10px 10px 0;">
                                    </div>
                                    @error('telepon')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: #eef3ec; border-color: #dfe8d8; border-radius: 10px 0 0 10px;"><i
                                                class="fas fa-envelope" style="color: #005F02;"></i></span>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $profil->email ?? '') }}" placeholder="email@yayasan.org"
                                            style="border-color: #dfe8d8; border-radius: 0 10px 10px 0;">
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Website</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: #eef3ec; border-color: #dfe8d8; border-radius: 10px 0 0 10px;"><i
                                                class="fas fa-globe" style="color: #005F02;"></i></span>
                                        <input type="url" name="website"
                                            class="form-control @error('website') is-invalid @enderror"
                                            value="{{ old('website', $profil->website ?? '') }}"
                                            placeholder="https://www.yayasan.org"
                                            style="border-color: #dfe8d8; border-radius: 0 10px 10px 0;">
                                    </div>
                                    @error('website')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Media Sosial --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-share-alt me-2"></i>Media Sosial
                        </div>
                        <div class="card-body py-3" style="background: #ffffff;">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">
                                        <i class="fab fa-instagram me-1" style="color: #e1306c;"></i>Instagram
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background: #eef3ec; border-color: #dfe8d8; border-radius: 10px 0 0 10px;">@</span>
                                        <input type="text" name="instagram"
                                            class="form-control @error('instagram') is-invalid @enderror"
                                            value="{{ old('instagram', ltrim($profil->instagram ?? '', '@')) }}"
                                            placeholder="username"
                                            style="border-color: #dfe8d8; border-radius: 0 10px 10px 0;">
                                    </div>
                                    @error('instagram')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">
                                        <i class="fab fa-facebook me-1" style="color: #1877f2;"></i>Facebook
                                    </label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', $profil->facebook ?? '') }}"
                                        placeholder="nama halaman / URL"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">
                                        <i class="fab fa-youtube me-1" style="color: #ff0000;"></i>YouTube
                                    </label>
                                    <input type="text" name="youtube"
                                        class="form-control @error('youtube') is-invalid @enderror"
                                        value="{{ old('youtube', $profil->youtube ?? '') }}"
                                        placeholder="nama channel / URL"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ===== KOLOM KANAN ===== --}}
                <div class="col-lg-4" style="align-self: start;">
                    <div style="position: sticky; top: 20px;">

                        {{-- Upload Logo --}}
                        <div class="card border-0 shadow-sm mb-4"
                            style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                            <div class="card-header fw-semibold border-bottom py-3"
                                style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                                <i class="fas fa-image me-2"></i>Logo Yayasan
                            </div>
                            <div class="card-body" style="background: #ffffff; padding: 1.25rem;">

                                {{-- Preview Logo Area --}}
                                <div class="text-center mb-3">
                                    @php
                                        $existingLogo = isset($profil->logo) && $profil->logo;
                                    @endphp

                                    @if($existingLogo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Saat Ini"
                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 12px; border: 2px solid #dfe8d8; background: #f8f9fa;">
                                    @else
                                        <div
                                            style="width: 100px; height: 100px; margin: 0 auto; background: #eef3ec; border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 2px dashed #dfe8d8;">
                                            <i class="fas fa-image" style="font-size: 2rem; color: #8cbf73;"></i>
                                        </div>
                                    @endif

                                    {{-- Preview untuk file baru yang dipilih --}}
                                    <div id="newLogoPreviewContainer" style="display: none; margin-top: 10px;">
                                        <hr style="margin: 10px 0;">
                                        <small style="color: #005F02;">Preview Logo Baru:</small>
                                        <img id="newLogoPreview" src="#" alt="Preview Logo Baru"
                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 12px; border: 2px solid #005F02; background: #f8f9fa; margin-top: 8px;">
                                    </div>
                                </div>

                                {{-- Input File --}}
                                <div class="mb-2">
                                    <input type="file" name="logo" id="logoInput"
                                        class="form-control @error('logo') is-invalid @enderror" accept="image/*"
                                        style="border-color: #dfe8d8; border-radius: 10px; font-size: 0.85rem; padding: 6px 10px;">
                                </div>
                                <small class="text-muted d-block" style="color: #6c757d !important; font-size: 0.7rem;">
                                    <i class="fas fa-info-circle me-1"></i>JPG, PNG, WEBP, SVG. Maks 2MB
                                </small>
                                @error('logo')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="card border-0 shadow-sm"
                            style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                            <div class="card-body" style="background: #ffffff; padding: 1.25rem;">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('admin.data-master.profil-yayasan') }}"
                                        class="btn btn-outline-secondary"
                                        style="border-radius: 8px; border-color: #dfe8d8; color: #2d2d2d; padding: 6px 18px; font-size: 0.85rem;">
                                        <i class="fas fa-times me-1"></i>Batal
                                    </a>
                                    <button type="submit" class="btn"
                                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; border: none; border-radius: 8px; padding: 6px 18px; font-weight: 500; font-size: 0.85rem;">
                                        <i class="fas fa-save me-1"></i>Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('logoInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('newLogoPreviewContainer');
            const previewImg = document.getElementById('newLogoPreview');

            // Validasi tipe file
            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];

            if (file) {
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan JPG, PNG, WEBP, atau SVG.');
                    this.value = ''; // reset input
                    previewContainer.style.display = 'none';
                    return;
                }

                if (file.size > 50 * 1024 * 1024) {
                    alert('Ukuran file maksimal 50MB!');
                    this.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImg.src = event.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                previewImg.src = '#';
            }
        });
    </script>
@endpush