@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="container-fluid px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold text-dark">Tambah Profil Yayasan</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('profil-yayasan.index') }}" class="text-decoration-none">Profil Yayasan</a>
                    </li>
                    <li class="breadcrumb-item active text-muted">Tambah</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.profil-yayasan.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- Error Summary --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <strong>Terdapat beberapa kesalahan:</strong>
        <ul class="mb-0 mt-1 ps-3">
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
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-id-card me-2 text-primary"></i>Identitas Yayasan
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">
                                    Nama Yayasan <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="nama_yayasan"
                                       class="form-control @error('nama_yayasan') is-invalid @enderror"
                                       value="{{ old('nama_yayasan') }}"
                                       placeholder="Contoh: Yayasan Peduli Bangsa">
                                @error('nama_yayasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Singkatan</label>
                                <input type="text" name="singkatan"
                                       class="form-control @error('singkatan') is-invalid @enderror"
                                       value="{{ old('singkatan') }}"
                                       placeholder="Contoh: YPB">
                                @error('singkatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri"
                                       class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                       value="{{ old('tahun_berdiri') }}"
                                       placeholder="Contoh: 2010"
                                       min="1900" max="{{ date('Y') }}">
                                @error('tahun_berdiri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Deskripsi Singkat</label>
                                <textarea name="deskripsi" rows="3"
                                          class="form-control @error('deskripsi') is-invalid @enderror"
                                          placeholder="Deskripsi singkat tentang yayasan...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-bullseye me-2 text-primary"></i>Visi & Misi
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Visi</label>
                                <textarea name="visi" rows="3"
                                          class="form-control @error('visi') is-invalid @enderror"
                                          placeholder="Visi yayasan...">{{ old('visi') }}</textarea>
                                @error('visi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Misi</label>
                                <small class="text-muted d-block mb-1">Bisa ditulis per baris untuk setiap poin misi.</small>
                                <textarea name="misi" rows="5"
                                          class="form-control @error('misi') is-invalid @enderror"
                                          placeholder="Misi yayasan (bisa ditulis per baris)...">{{ old('misi') }}</textarea>
                                @error('misi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kontak & Alamat --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>Kontak & Alamat
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Alamat Lengkap</label>
                                <input type="text" name="alamat"
                                       class="form-control @error('alamat') is-invalid @enderror"
                                       value="{{ old('alamat') }}"
                                       placeholder="Jl. Contoh No. 1, Kelurahan, Kecamatan">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Kota</label>
                                <input type="text" name="kota"
                                       class="form-control @error('kota') is-invalid @enderror"
                                       value="{{ old('kota') }}"
                                       placeholder="Contoh: Surabaya">
                                @error('kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Provinsi</label>
                                <input type="text" name="provinsi"
                                       class="form-control @error('provinsi') is-invalid @enderror"
                                       value="{{ old('provinsi') }}"
                                       placeholder="Contoh: Jawa Timur">
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Kode Pos</label>
                                <input type="text" name="kode_pos"
                                       class="form-control @error('kode_pos') is-invalid @enderror"
                                       value="{{ old('kode_pos') }}"
                                       placeholder="Contoh: 60111">
                                @error('kode_pos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone text-muted"></i></span>
                                    <input type="text" name="telepon"
                                           class="form-control @error('telepon') is-invalid @enderror"
                                           value="{{ old('telepon') }}"
                                           placeholder="031-12345678">
                                </div>
                                @error('telepon')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope text-muted"></i></span>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="email@yayasan.org">
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Website</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-globe text-muted"></i></span>
                                    <input type="url" name="website"
                                           class="form-control @error('website') is-invalid @enderror"
                                           value="{{ old('website') }}"
                                           placeholder="https://www.yayasan.org">
                                </div>
                                @error('website')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Media Sosial --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-share-alt me-2 text-primary"></i>Media Sosial
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    <i class="fab fa-instagram me-1 text-danger"></i>Instagram
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">@</span>
                                    <input type="text" name="instagram"
                                           class="form-control @error('instagram') is-invalid @enderror"
                                           value="{{ old('instagram') }}"
                                           placeholder="username">
                                </div>
                                @error('instagram')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    <i class="fab fa-facebook me-1 text-primary"></i>Facebook
                                </label>
                                <input type="text" name="facebook"
                                       class="form-control @error('facebook') is-invalid @enderror"
                                       value="{{ old('facebook') }}"
                                       placeholder="nama halaman / URL">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">
                                    <i class="fab fa-youtube me-1 text-danger"></i>YouTube
                                </label>
                                <input type="text" name="youtube"
                                       class="form-control @error('youtube') is-invalid @enderror"
                                       value="{{ old('youtube') }}"
                                       placeholder="nama channel / URL">
                                @error('youtube')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Legalitas --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-file-alt me-2 text-primary"></i>Legalitas
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">No. Akta Notaris</label>
                                <input type="text" name="no_akta"
                                       class="form-control @error('no_akta') is-invalid @enderror"
                                       value="{{ old('no_akta') }}"
                                       placeholder="AHU-001.AH.01">
                                @error('no_akta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">No. SK Kemenkumham</label>
                                <input type="text" name="no_sk_kemenkumham"
                                       class="form-control @error('no_sk_kemenkumham') is-invalid @enderror"
                                       value="{{ old('no_sk_kemenkumham') }}"
                                       placeholder="AHU-0001234.01">
                                @error('no_sk_kemenkumham')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">NPWP</label>
                                <input type="text" name="npwp"
                                       class="form-control @error('npwp') is-invalid @enderror"
                                       value="{{ old('npwp') }}"
                                       placeholder="01.234.567.8-910.000">
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
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-image me-2 text-primary"></i>Logo Yayasan
                    </div>
                    <div class="card-body text-center py-4">
                        <div id="logo-preview-wrap" class="mb-3 d-none">
                            <img id="logo-preview" src="#" alt="Preview Logo"
                                 class="img-thumbnail mb-2"
                                 style="max-height:130px; max-width:100%; object-fit:contain;">
                        </div>
                        <input type="file" name="logo"
                               class="form-control @error('logo') is-invalid @enderror"
                               accept="image/*"
                               onchange="previewImg(this,'logo-preview','logo-preview-wrap')">
                        <small class="text-muted d-block mt-2">
                            <i class="fas fa-info-circle me-1"></i>JPG, PNG, WEBP, SVG. Maks 2MB
                        </small>
                        @error('logo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Upload Foto Gedung --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold border-bottom py-3">
                        <i class="fas fa-photo-video me-2 text-primary"></i>Foto Gedung
                    </div>
                    <div class="card-body text-center py-4">
                        <div id="gedung-preview-wrap" class="mb-3 d-none">
                            <img id="gedung-preview" src="#" alt="Preview Gedung"
                                 class="img-thumbnail mb-2 w-100"
                                 style="max-height:160px; object-fit:cover;">
                        </div>
                        <input type="file" name="foto_gedung"
                               class="form-control @error('foto_gedung') is-invalid @enderror"
                               accept="image/*"
                               onchange="previewImg(this,'gedung-preview','gedung-preview-wrap')">
                        <small class="text-muted d-block mt-2">
                            <i class="fas fa-info-circle me-1"></i>JPG, PNG, WEBP. Maks 3MB
                        </small>
                        @error('foto_gedung')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-grid gap-2 py-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>Simpan Profil
                        </button>
                        <a href="{{ route('profil-yayasan.index') }}" class="btn btn-outline-secondary">
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
        reader.onload = e => {
            preview.src = e.target.result;
            wrapper.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush