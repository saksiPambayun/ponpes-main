@extends('admin.layout')

@section('title', 'Edit Fasilitas')
@section('page-title', 'Edit Fasilitas')

@push('styles')
    <style>
        :root {
            --green-main: #005F02;
            --green-dark: #0d4f14;
            --green-darker: #0f4d1c;
            --green-medium: #2e6b37;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-light: #f4f4f4;
            --bg-soft: #eef3ec;
            --bg-section: #dfe8d8;
            --text-main: #333;
            --text-dark: #222;
            --text-muted: #2d2d2d;
            --white: #ffffff;
            --shadow-soft: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        .form-card {
            background: var(--white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px var(--shadow-soft);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            padding: 1.4rem 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .form-card-header span {
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: -0.1px;
        }

        .form-card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.4rem;
        }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.45rem;
            display: block;
            letter-spacing: -0.1px;
        }

        .form-group label .req {
            color: #dc2626;
            margin-left: 2px;
        }

        .form-group label .opt {
            color: var(--green-soft);
            font-weight: 400;
            font-size: 0.75rem;
            margin-left: 4px;
        }

        .form-control {
            font-family: 'Inter', sans-serif;
            font-size: 0.87rem;
            color: var(--text-main);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            background: var(--bg-light);
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--green-main);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12);
            outline: none;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 0.87rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
            text-decoration: none;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.55rem 1.1rem;
            background: var(--white);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
        }

        .current-photo {
            margin-bottom: 0.75rem;
        }

        .current-photo img {
            max-height: 100px;
            border-radius: 8px;
            border: 1px solid var(--bg-section);
        }

        .text-muted {
            font-size: 0.75rem;
            color: var(--green-soft);
            margin-top: 0.25rem;
            display: block;
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--bg-section);
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.78rem;
            margin-top: 0.35rem;
        }

        .page-wrapper {
            background: var(--bg-light);
            min-height: 100vh;
            padding: 2rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.35);
        }

        .page-icon i {
            color: var(--white);
            font-size: 1.1rem;
        }

        .page-title h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .page-title p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .col-md-6 {
            flex: 1;
            min-width: 250px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper">
        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="page-title">
                    <h1>Edit Fasilitas</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- Form Card --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-clipboard-list"></i>
                <span>Form Edit Fasilitas</span>
            </div>

            <div class="form-card-body">
                <form action="{{ route('admin.data-master.fasilitas.update', $fasilitas->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="section-label">Informasi Utama</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Fasilitas <span class="req">*</span></label>
                                <input type="text" name="nama_fasilitas"
                                    class="form-control @error('nama_fasilitas') is-invalid @enderror"
                                    value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" required>
                                @error('nama_fasilitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kategori <span class="opt">(opsional)</span></label>
                                <input type="text" name="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    value="{{ old('kategori', $fasilitas->kategori) }}">
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jumlah <span class="req">*</span></label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror"
                                    value="{{ old('jumlah', $fasilitas->jumlah) }}" min="0" required>
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kondisi <span class="req">*</span></label>
                                <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik" {{ old('kondisi', $fasilitas->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak Ringan" {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                    <option value="Rusak Berat" {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi <span class="opt">(opsional)</span></label>
                                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                    value="{{ old('lokasi', $fasilitas->lokasi) }}">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Pengadaan <span class="opt">(opsional)</span></label>
                                <input type="date" name="tanggal_pengadaan"
                                    class="form-control @error('tanggal_pengadaan') is-invalid @enderror"
                                    value="{{ old('tanggal_pengadaan', $fasilitas->tanggal_pengadaan ? $fasilitas->tanggal_pengadaan->format('Y-m-d') : '') }}">
                                @error('tanggal_pengadaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto Fasilitas <span class="opt">(opsional)</span></label>
                                @if($fasilitas->foto)
                                    <div class="current-photo">
                                        <img src="{{ asset('storage/' . $fasilitas->foto) }}" alt="Foto">
                                        <small class="text-muted">Foto saat ini</small>
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                    accept="image/*">
                                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB (Kosongkan jika tidak
                                    ingin mengubah)</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-label">Deskripsi & Keterangan</div>

                    <div class="form-group">
                        <label>Deskripsi <span class="opt">(opsional)</span></label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                            placeholder="Tuliskan deskripsi fasilitas...">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan Tambahan <span class="opt">(opsional)</span></label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="2"
                            placeholder="Informasi tambahan...">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Update
                        </button>

                        <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection