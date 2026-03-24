@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
    <section class="form-section">  
        <div class="container-form">
            <h2 class="form-title">
                <i class="bi bi-journal-text"></i>
                Formulir Pendaftaran Santri Baru
            </h2>
            <p class="form-sub">Lengkapilah data berikut dengan benar!</p>

            <form>
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-person-lines-fill"></i>
                        Data Santri
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Nama sesuai akta kelahiran">
                        </div>

                        <div class="form-control">
                            <label>Asal Sekolah</label>
                            <input type="text" placeholder="Nama sekolah terakhir">
                        </div>

                        <div class="form-control">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" placeholder="Tempat dan Tanggal lahir">
                        </div>

                        <div class="form-control">
                            <label>Alamat</label>
                            <textarea rows="3" placeholder="Alamat lengkap"></textarea>
                        </div>
                    </div>

                    <div class="radio-group">
                        <label>Jenis Kelamin</label>

                        <div class="radio-option">
                            <input type="radio" name="jk"> Laki - Laki
                            <input type="radio" name="jk"> Perempuan
                        </div>
                    </div>
                </div>

                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Ayah</label>
                            <input type="text" placeholder="Nama Ayah">
                        </div>

                        <div class="form-control">
                            <label>Nama Ibu</label>
                            <input type="text" placeholder="Nama Ibu">
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan</label>
                            <input type="text" placeholder="Pekerjaan">
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan</label>
                            <input type="text" placeholder="Pekerjaan">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon</label>
                            <input type="text" placeholder="No. Telepon">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon</label>
                            <input type="text" placeholder="No. Telepon">
                        </div>
                    </div>
                </div>

                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-upload"></i>
                        Upload Dokumen
                    </h3>

                    <div class="upload-grid">
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Kartu Keluarga</span>
                            <small>Format JPG / PDF (Maks 2MB)</small>
                            <input type="file" hidden>
                        </label>

                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Pas Foto</span>
                            <small>Format JPG / PDF (Maks 2MB)</small>
                            <input type="file" hidden>
                        </label>
                    </div>
                </div>

                <div class="checkbox-form">
                    <input type="checkbox">
                    <span>Saya menyatakan data yang diisi sudah benar.</span>
                </div>

                <div class="submit-form">
                    <button type="submit" class="btn-kirim">
                        Kirim Formulir
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
