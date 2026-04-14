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

        <form action="/daftar" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ================= DATA SANTRI ================= --}}
            <div class="form-group-section">
                <h3 class="section-title">
                    <i class="bi bi-person-lines-fill"></i>
                    Data Santri
                </h3>

                <div class="grid-form">
                    <div class="form-control">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap">
                    </div>

                    <div class="form-control">
                        <label>Asal Sekolah</label>
                        <input type="text" name="asal_sekolah">
                    </div>

                    <div class="form-control">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir">
                    </div>

                    <div class="form-control">
                        <label>NISN</label>
                        <input type="text" name="nisn">
                    </div>

                    <div class="form-control">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir">
                    </div>

                    <div class="form-control">
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>

                    <div class="form-control">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3"></textarea>
                    </div>
                </div>

                <div class="radio-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-option">
                        <label><input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-Laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
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
                        <label>Nama Wali</label>
                        <input type="text" name="nama_wali">
                    </div>

                    <div class="form-control">
                        <label>Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali">
                    </div>

                    <div class="form-control">
                        <label>No. Telepon</label>
                        <input type="text" name="no_wali">
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
                    </label>

                    {{-- FOTO --}}
                    <label class="upload-box">
                        <i class="bi bi-upload"></i>
                        <span>Upload Pas Foto</span>
                        <small>JPG, PNG, PDF (Max 2MB)</small>

                        <input type="file" name="foto" hidden onchange="showPreview(this)">
                        <p class="file-name"></p>
                        <img class="preview-img" style="display:none; max-height:100px;">
                    </label>

                </div>
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
            </div>

        </form>
    </div>
</section>

{{-- ================= SCRIPT ================= --}}
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