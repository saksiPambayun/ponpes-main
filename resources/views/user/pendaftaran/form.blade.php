@extends('layouts.app')

@section('title', 'Formulir Pendaftaran')

@section('content')
    <section class="form-section">
        <div class="container-form">
            <h2 class="form-title">
                <i class="bi bi-journal-text"></i>
                Formulir Pendaftaran Santri Baru
            </h2>

            <p class="form-sub">Lengkapilah data berikut dengan benar!</p>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('user.pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="wave_id" value="{{ $activeWave->id }}">

                {{-- ================= DATA SANTRI ================= --}}
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-person-lines-fill"></i>
                        Data Santri
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Lengkap <span class="required">*</span></label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                            @error('nama_lengkap') <small class="error">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-control">
                            <label>Asal Sekolah <span class="required">*</span></label>
                            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
                            @error('asal_sekolah') <small class="error">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-control">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        </div>

                        <div class="form-control">
                            <label>NISN</label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}">
                        </div>

                        <div class="form-control">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>

                        <div class="form-control">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}">
                            @error('email') <small class="error">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-control full-width">
                            <label>Alamat</label>
                            <textarea name="alamat" rows="3">{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="radio-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-option">
                            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}> Laki-Laki</label>
                            <label><input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}> Perempuan</label>
                        </div>
                    </div>
                </div>

                {{-- ================= DATA ORANG TUA ================= --}}
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Wali <span class="required">*</span></label>
                            <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" required>
                            @error('nama_wali') <small class="error">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan Wali</label>
                            <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon <span class="required">*</span></label>
                            <input type="text" name="no_wali" value="{{ old('no_wali') }}" required>
                            @error('no_wali') <small class="error">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                {{-- ================= RINCIAN BIAYA ================= --}}
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-calculator-fill"></i>
                        Rincian Biaya Pendidikan
                    </h3>

                    <div class="biaya-detail-box">
                        @php
                            $totalBiaya = 0;
                        @endphp

                        {{-- TEMPAT @foreach DI SINI --}}
                        @foreach(getBiayaPendaftaran() as $biaya)
                            @php $totalBiaya += $biaya->nominal; @endphp
                            <div class="biaya-row">
                                <div class="biaya-col">
                                    <strong>{{ $biaya->nama_biaya }}</strong>
                                    @if($biaya->keterangan)
                                        <small>{{ $biaya->keterangan }}</small>
                                    @endif
                                </div>
                                <div class="biaya-col text-end">
                                    <span class="biaya-nominal">{{ $biaya->nominal_formatted }}</span>
                                </div>
                            </div>
                        @endforeach

                        <div class="biaya-total">
                            <div class="biaya-row">
                                <div class="biaya-col">
                                    <strong>Total Biaya Awal</strong>
                                </div>
                                <div class="biaya-col text-end">
                                    <strong class="text-success">{{ formatRupiah($totalBiaya) }}</strong>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle"></i>
                                Biaya dapat dibayarkan setelah pendaftaran diverifikasi.
                            </small>
                        </div>
                    </div>
                </div>


                {{-- ================= UPLOAD ================= --}}
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-upload"></i>
                        Upload Dokumen
                    </h3>

                    <div class="upload-grid">
                        {{-- KK --}}
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Kartu Keluarga</span>
                            <small>JPG, PNG, PDF (Max 2MB)</small>
                            <input type="file" name="kk" hidden onchange="showPreview(this)">
                            <p class="file-name"></p>
                            <img class="preview-img" style="display:none; max-height:100px;">
                            @error('kk') <small class="error">{{ $message }}</small> @enderror
                        </label>

                        {{-- FOTO --}}
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Pas Foto</span>
                            <small>JPG, PNG (Max 2MB)</small>
                            <input type="file" name="foto" hidden onchange="showPreview(this)">
                            <p class="file-name"></p>
                            <img class="preview-img" style="display:none; max-height:100px;">
                            @error('foto') <small class="error">{{ $message }}</small> @enderror
                        </label>
                    </div>
                </div>

                {{-- Informasi Gelombang --}}
                <div class="info-wave">
                    <i class="bi bi-info-circle"></i>
                    Anda mendaftar pada <strong>{{ $activeWave->name }}</strong>
                    ({{ \Carbon\Carbon::parse($activeWave->start_date)->format('d/m/Y') }} -
                    {{ \Carbon\Carbon::parse($activeWave->end_date)->format('d/m/Y') }})
                </div>

                {{-- ================= CHECKBOX ================= --}}
                <div class="checkbox-form">
                    <input type="checkbox" required>
                    <span>Saya menyatakan data yang diisi sudah benar.</span>
                </div>

                {{-- ================= SUBMIT ================= --}}
                <div class="submit-form">
                    <button type="submit" class="btn-kirim">
                        Kirim Formulir
                    </button>
                    <a href="{{ route('user.pendaftaran.index') }}" class="btn-batal">Batal</a>
                </div>

            </form>
        </div>
    </section>

    <style>
        .form-section {
            padding: 50px 0;
            background: #f0f4f0;
            min-height: 100vh;
        }

        .container-form {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            color: #005F02;
            margin-bottom: 10px;
        }

        .form-sub {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .form-group-section {
            background: #f9f9f9;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .section-title {
            color: #005F02;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #005F02;
        }

        .grid-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-control {
            display: flex;
            flex-direction: column;
        }

        .form-control.full-width {
            grid-column: span 2;
        }

        .form-control label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .required {
            color: #dc3545;
        }

        .form-control input,
        .form-control textarea {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control input:focus,
        .form-control textarea:focus {
            outline: none;
            border-color: #005F02;
        }

        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .radio-group {
            margin-top: 15px;
        }

        .radio-group>label {
            font-weight: 600;
            margin-right: 20px;
        }

        .radio-option {
            display: inline-flex;
            gap: 20px;
        }

        .upload-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .upload-box {
            border: 2px dashed #005F02;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-box:hover {
            background: #e8f5e9;
        }

        .upload-box i {
            font-size: 30px;
            color: #005F02;
        }

        .upload-box span {
            display: block;
            font-weight: 600;
            margin: 10px 0;
        }

        .upload-box small {
            color: #666;
        }

        .file-name {
            font-size: 12px;
            color: #005F02;
            margin-top: 10px;
        }

        .info-wave {
            background: #e8f5e9;
            padding: 12px 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
        }

        .checkbox-form {
            margin: 20px 0;
            text-align: center;
        }

        .submit-form {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-kirim {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-kirim:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 95, 2, 0.3);
        }

        .btn-batal {
            background: #6c757d;
            color: white;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-batal:hover {
            background: #5a6268;
            color: white;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        <style>.biaya-detail-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
        }

        .biaya-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px dashed #dee2e6;
        }

        .biaya-row:last-child {
            border-bottom: none;
        }

        .biaya-col {
            flex: 1;
        }

        .biaya-col.text-end {
            text-align: right;
        }

        .biaya-nominal {
            color: #005F02;
            font-weight: 500;
        }

        .biaya-total {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 2px solid #005F02;
        }

        .biaya-col small {
            display: block;
            font-size: 0.7rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .text-success {
            color: #005F02 !important;
        }
    </style>


    @media (max-width: 768px) {

    .grid-form,
    .upload-grid {
    grid-template-columns: 1fr;
    }

    .form-control.full-width {
    grid-column: span 1;
    }

    .container-form {
    padding: 20px;
    }
    }
    </style>

    <script>
        function showPreview(input) {
            const file = input.files[0];
            const fileName = input.parentElement.querySelector('.file-name');
            const preview = input.parentElement.querySelector('.preview-img');

            if (!file) return;

            fileName.textContent = file.name;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
@endsection