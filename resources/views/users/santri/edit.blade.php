@extends('layouts.user')

@section('title', 'Edit Pendaftaran Santri')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Edit Pendaftaran Santri</h4>
            <small class="text-muted">Perbaiki data jika terdapat kesalahan</small>
        </div>

        <a href="{{ route('user.santri.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- DATA SANTRI --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white fw-semibold">
                        Data Santri
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control"
                                value="{{ old('nama_lengkap', $santri->nama_lengkap) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $santri->nisn) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control"
                                value="{{ old('asal_sekolah', $santri->asal_sekolah) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control"
                                rows="3">{{ old('alamat', $santri->alamat) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>


            {{-- DATA WALI --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white fw-semibold">
                        Data Wali
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control"
                                value="{{ old('nama_wali', $santri->nama_wali) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No Telepon Wali</label>
                            <input type="text" name="no_wali" class="form-control"
                                value="{{ old('no_wali', $santri->no_wali) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pekerjaan Wali</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                value="{{ old('pekerjaan', $santri->pekerjaan) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $santri->email) }}">
                        </div>

                    </div>
                </div>
            </div>


            {{-- DOKUMEN --}}
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white fw-semibold">
                        Dokumen
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Kartu Keluarga (KK)</label>

                                @if($santri->dok_kk)
                                    <div class="mb-2">
                                        <a href="{{ Storage::url($santri->dok_kk) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-file me-1"></i> Lihat Dokumen Lama
                                        </a>
                                    </div>
                                @endif

                                <input type="file" name="dok_kk" class="form-control">

                                <small class="text-muted">
                                    Format: PDF/JPG/PNG (max 20MB)
                                </small>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">Akta Kelahiran</label>

                                @if($santri->dok_akta)
                                    <div class="mb-2">
                                        <a href="{{ Storage::url($santri->dok_akta) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-file me-1"></i> Lihat Dokumen Lama
                                        </a>
                                    </div>
                                @endif

                                <input type="file" name="dok_akta" class="form-control">

                                <small class="text-muted">
                                    Format: PDF/JPG/PNG (max 20MB)
                                </small>

                            </div>

                        </div>

                    </div>
                </div>
            </div>


            {{-- BUTTON --}}
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">

                    <div class="card-body d-flex justify-content-between">

                        <a href="{{ route('user.santri.index') }}" class="btn btn-outline-secondary">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Update Data
                        </button>

                    </div>

                </div>
            </div>

        </div>

    </form>

@endsection