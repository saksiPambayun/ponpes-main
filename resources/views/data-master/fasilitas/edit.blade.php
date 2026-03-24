@extends('layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Fasilitas
        </h1>

        <div>
            <span class="text-muted small mr-2">
                <i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}
            </span>

            <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Edit Fasilitas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Edit Fasilitas
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.data-master.fasilitas.update', ['id' => $fasilitas->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Fasilitas <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_fasilitas" 
                                   class="form-control @error('nama_fasilitas') is-invalid @enderror" 
                                   value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" 
                                   required>
                            @error('nama_fasilitas')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" 
                                   name="kategori" 
                                   class="form-control @error('kategori') is-invalid @enderror" 
                                   value="{{ old('kategori', $fasilitas->kategori) }}">
                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jumlah <span class="text-danger">*</span></label>
                            <input type="number" 
                                   name="jumlah" 
                                   class="form-control @error('jumlah') is-invalid @enderror" 
                                   value="{{ old('jumlah', $fasilitas->jumlah) }}" 
                                   min="0"
                                   required>
                            @error('jumlah')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kondisi <span class="text-danger">*</span></label>
                            <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik" {{ old('kondisi', $fasilitas->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                            @error('kondisi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" 
                                   name="lokasi" 
                                   class="form-control @error('lokasi') is-invalid @enderror" 
                                   value="{{ old('lokasi', $fasilitas->lokasi) }}">
                            @error('lokasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pengadaan</label>
                            <input type="date" 
                                   name="tanggal_pengadaan" 
                                   class="form-control @error('tanggal_pengadaan') is-invalid @enderror" 
                                   value="{{ old('tanggal_pengadaan', $fasilitas->tanggal_pengadaan ? $fasilitas->tanggal_pengadaan->format('Y-m-d') : '') }}">
                            @error('tanggal_pengadaan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Foto Fasilitas</label>
                            @if($fasilitas->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$fasilitas->foto) }}" 
                                         alt="Foto" 
                                         class="img-thumbnail" 
                                         style="max-height: 100px;">
                                    <small class="text-muted d-block">Foto saat ini</small>
                                </div>
                            @endif
                            <input type="file" 
                                   name="foto" 
                                   class="form-control-file @error('foto') is-invalid @enderror" 
                                   accept="image/*">
                            <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB (Kosongkan jika tidak ingin mengubah)</small>
                            @error('foto')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="3">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Keterangan Tambahan</label>
                    <textarea name="keterangan" 
                              class="form-control @error('keterangan') is-invalid @enderror" 
                              rows="2">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>

                    <a href="{{ route('data-master.fasilitas.index') }}" class="btn btn-danger">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection