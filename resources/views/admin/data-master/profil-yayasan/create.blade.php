@extends('admin.layout')

@section('title', 'Tambah Profil Yayasan')

@section('content')
    <div class="container-fluid px-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1 fw-bold" style="color: #222;">Tambah Profil Yayasan</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"
                                style="color: #005F02;">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('profil-yayasan.index') }}" class="text-decoration-none"
                                style="color: #005F02;">Profil Yayasan</a>
                        </li>
                        <li class="breadcrumb-item active text-muted">Tambah</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('profil-yayasan.index') }}" class="btn btn-outline-secondary"
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

        <form action="{{ route('profil-yayasan.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">
                                        Nama Yayasan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nama_yayasan"
                                        class="form-control @error('nama_yayasan') is-invalid @enderror"
                                        value="{{ old('nama_yayasan') }}" placeholder="Contoh: Yayasan Peduli Bangsa"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('nama_yayasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Singkatan</label>
                                    <input type="text" name="singkatan"
                                        class="form-control @error('singkatan') is-invalid @enderror"
                                        value="{{ old('singkatan') }}" placeholder="Contoh: YPB"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('singkatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri"
                                        class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                        value="{{ old('tahun_berdiri') }}" placeholder="Contoh: 2010" min="1900"
                                        max="{{ date('Y') }}" style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Deskripsi Singkat</label>
                                    <textarea name="deskripsi" rows="3"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Deskripsi singkat tentang yayasan..."
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('deskripsi') }}</textarea>
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
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('visi') }}</textarea>
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
                                        style="border-color: #dfe8d8; border-radius: 10px;">{{ old('misi') }}</textarea>
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
                                        value="{{ old('alamat') }}" placeholder="Jl. Contoh No. 1, Kelurahan, Kecamatan"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Kota</label>
                                    <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror"
                                        value="{{ old('kota') }}" placeholder="Contoh: Surabaya"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('kota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Provinsi</label>
                                    <input type="text" name="provinsi"
                                        class="form-control @error('provinsi') is-invalid @enderror"
                                        value="{{ old('provinsi') }}" placeholder="Contoh: Jawa Timur"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">Kode Pos</label>
                                    <input type="text" name="kode_pos"
                                        class="form-control @error('kode_pos') is-invalid @enderror"
                                        value="{{ old('kode_pos') }}" placeholder="Contoh: 60111"
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
                                            value="{{ old('telepon') }}" placeholder="031-12345678"
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
                                            value="{{ old('email') }}" placeholder="email@yayasan.org"
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
                                            value="{{ old('website') }}" placeholder="https://www.yayasan.org"
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
                                            value="{{ old('instagram') }}" placeholder="username"
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
                                        value="{{ old('facebook') }}" placeholder="nama halaman / URL"
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
                                        value="{{ old('youtube') }}" placeholder="nama channel / URL"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Legalitas --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-file-alt me-2"></i>Legalitas
                        </div>
                        <div class="card-body py-3" style="background: #ffffff;">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">No. Akta Notaris</label>
                                    <input type="text" name="no_akta"
                                        class="form-control @error('no_akta') is-invalid @enderror"
                                        value="{{ old('no_akta') }}" placeholder="AHU-001.AH.01"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('no_akta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">No. SK Kemenkumham</label>
                                    <input type="text" name="no_sk_kemenkumham"
                                        class="form-control @error('no_sk_kemenkumham') is-invalid @enderror"
                                        value="{{ old('no_sk_kemenkumham') }}" placeholder="AHU-0001234.01"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('no_sk_kemenkumham')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" style="color: #2d2d2d;">NPWP</label>
                                    <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror"
                                        value="{{ old('npwp') }}" placeholder="01.234.567.8-910.000"
                                        style="border-color: #dfe8d8; border-radius: 10px;">
                                    @error('npwp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ===== KOLOM KANAN ===== --}}
                <div class="col-lg-4">

                    {{-- Upload Logo --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-image me-2"></i>Logo Yayasan
                        </div>
                        <div class="card-body text-center py-4" style="background: #ffffff;">
                            <div id="logo-preview-wrap" class="mb-3 d-none">
                                <img id="logo-preview" src="#" alt="Preview Logo" class="img-thumbnail mb-2"
                                    style="max-height:130px; max-width:100%; object-fit:contain; border-color: #dfe8d8; border-radius: 12px;">
                            </div>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"
                                accept="image/*" onchange="previewImg(this,'logo-preview','logo-preview-wrap')"
                                style="border-color: #dfe8d8; border-radius: 10px;">
                            <small class="text-muted d-block mt-2" style="color: #2d2d2d !important;">
                                <i class="fas fa-info-circle me-1"></i>JPG, PNG, WEBP, SVG. Maks 2MB
                            </small>
                            @error('logo')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Upload Foto Gedung --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-header fw-semibold border-bottom py-3"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c) !important; color: #fff; border: none;">
                            <i class="fas fa-photo-video me-2"></i>Foto Gedung
                        </div>
                        <div class="card-body text-center py-4" style="background: #ffffff;">
                            <div id="gedung-preview-wrap" class="mb-3 d-none">
                                <img id="gedung-preview" src="#" alt="Preview Gedung" class="img-thumbnail mb-2 w-100"
                                    style="max-height:160px; object-fit:cover; border-color: #dfe8d8; border-radius: 12px;">
                            </div>
                            <input type="file" name="foto_gedung"
                                class="form-control @error('foto_gedung') is-invalid @enderror" accept="image/*"
                                onchange="previewImg(this,'gedung-preview','gedung-preview-wrap')"
                                style="border-color: #dfe8d8; border-radius: 10px;">
                            <small class="text-muted d-block mt-2" style="color: #2d2d2d !important;">
                                <i class="fas fa-info-circle me-1"></i>JPG, PNG, WEBP. Maks 3MB
                            </small>
                            @error('foto_gedung')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="card border-0 shadow-sm"
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.1);">
                        <div class="card-body d-grid gap-2 py-3" style="background: #ffffff;">
                            <button type="submit" class="btn btn-lg"
                                style="background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; border: none; border-radius: 12px; padding: 12px; font-weight: 600;">
                                <i class="fas fa-save me-2"></i>Simpan Profil
                            </button>
                            <a href="{{ route('profil-yayasan.index') }}" class="btn btn-outline-secondary text-center"
                                style="border-radius: 12px; border-color: #dfe8d8; color: #2d2d2d; padding: 12px;">
                                <i class="fas fa-times me-1"></i>Batal
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImg(input, previewId, wrapperId) {
            const preview = document.getElementById(previewId);
            const wrapper = document.getElementById(wrapperId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    wrapper.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
