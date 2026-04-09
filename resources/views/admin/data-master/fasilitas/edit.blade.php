@extends('admin.layout')

@section('title', 'Edit Fasilitas')
@section('page-title', 'Edit Fasilitas')

@push('styles')
    <style>
        .form-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, #4361ee, #7209b7);
            padding: 1.4rem 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-card-header i {
            color: rgba(255,255,255,0.85);
            font-size: 1rem;
        }

        .form-card-header span {
            color: #fff;
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
            color: #2d3748;
            margin-bottom: 0.45rem;
            display: block;
            letter-spacing: -0.1px;
        }

        .form-group label .req {
            color: #e53e3e;
            margin-left: 2px;
        }

        .form-group label .opt {
            color: #a0aec0;
            font-weight: 400;
            font-size: 0.75rem;
            margin-left: 4px;
        }

        .form-control {
            font-family: 'Inter', sans-serif;
            font-size: 0.87rem;
            color: #2d3748;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            background: #f8fafc;
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4361ee;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.12);
            outline: none;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(135deg, #4361ee, #7209b7);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(67, 97, 238, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: #f7fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            color: #718096;
            font-size: 0.87rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
            color: #4a5568;
            text-decoration: none;
        }

        .current-photo {
            margin-bottom: 0.75rem;
        }

        .current-photo img {
            max-height: 100px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .text-muted {
            font-size: 0.75rem;
            color: #a0aec0;
            margin-top: 0.25rem;
            display: block;
        }

        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #a0aec0;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #edf2f7;
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        {{-- Page Header --}}
        <div class="page-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon" style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(67, 97, 238, 0.35);">
                    <i class="fas fa-edit" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div class="page-title">
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Edit Fasilitas</h1>
                    <p style="font-size: 0.8rem; color: #8898aa; margin: 0;"><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-back" style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; color: #4a5568; font-size: 0.82rem; font-weight: 600; text-decoration: none;">
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
                <form action="{{ route('admin.data-master.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="section-label">Informasi Utama</div>

                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group">
                                <label>Nama Fasilitas <span class="req">*</span></label>
                                <input type="text" name="nama_fasilitas"
                                    class="form-control @error('nama_fasilitas') is-invalid @enderror"
                                    value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" required>
                                @error('nama_fasilitas')
                                    <div class="invalid-feedback" style="color: #e53e3e; font-size: 0.78rem; margin-top: 0.35rem;">{{ $message }}</div>
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

                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
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
                                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB (Kosongkan jika tidak ingin mengubah)</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-label">Deskripsi & Keterangan</div>

                    <div class="form-group">
                        <label>Deskripsi <span class="opt">(opsional)</span></label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                            rows="3" placeholder="Tuliskan deskripsi fasilitas...">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan Tambahan <span class="opt">(opsional)</span></label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                            rows="2" placeholder="Informasi tambahan...">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions" style="display: flex; align-items: center; gap: 0.75rem; padding-top: 1rem;">
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
