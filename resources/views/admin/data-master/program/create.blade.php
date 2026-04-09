@extends('admin.layout')

@section('title', 'Tambah Program')

@section('content')
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        {{-- Page Header --}}
        <div class="page-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon" style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-plus-circle" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Tambah Program</h1>
                    <p style="font-size: 0.8rem; color: #8898aa; margin: 0;">Lengkapi form berikut untuk menambah program baru</p>
                </div>
            </div>
            <a href="{{ route('admin.program.index') }}" class="btn-back" style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; color: #4a5568; font-size: 0.82rem; font-weight: 600; text-decoration: none;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- Form Card --}}
        <div class="form-card" style="background: #fff; border-radius: 20px; border: none; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
            <div class="form-card-header" style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1.2rem 1.8rem; display: flex; align-items: center; gap: 0.75rem;">
                <i class="fas fa-clipboard-list" style="color: rgba(255,255,255,0.85);"></i>
                <span style="color: #fff; font-size: 0.95rem; font-weight: 600;">Form Tambah Program</span>
            </div>

            <div class="form-card-body" style="padding: 1.8rem;">
                <form action="{{ route('admin.program.store') }}" method="POST">
                    @csrf

                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Nama Program <span style="color: #e53e3e;">*</span></label>
                                <input type="text" name="nama_program" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;" value="{{ old('nama_program') }}" placeholder="Masukkan nama program" required>
                                @error('nama_program') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Kategori <span style="color: #e53e3e;">*</span></label>
                                <select name="kategori" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="pendidikan" {{ old('kategori') == 'pendidikan' ? 'selected' : '' }}>📚 Pendidikan</option>
                                    <option value="sosial" {{ old('kategori') == 'sosial' ? 'selected' : '' }}>❤️ Sosial</option>
                                    <option value="keagamaan" {{ old('kategori') == 'keagamaan' ? 'selected' : '' }}>🕌 Keagamaan</option>
                                    <option value="kesehatan" {{ old('kategori') == 'kesehatan' ? 'selected' : '' }}>🏥 Kesehatan</option>
                                </select>
                                @error('kategori') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;" value="{{ old('tanggal_mulai') }}">
                            </div>

                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;" value="{{ old('tanggal_selesai') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.3rem;">
                        <label style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Deskripsi <span style="color: #e53e3e;">*</span></label>
                        <textarea name="deskripsi" rows="5" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc; resize: vertical;" placeholder="Jelaskan deskripsi program secara detail...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-actions" style="display: flex; align-items: center; gap: 0.75rem; padding-top: 1rem; border-top: 1px solid #f0f4f8; margin-top: 1rem;">
                        <button type="submit" class="btn-save" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #4361ee, #7209b7); color: #fff; border: none; border-radius: 10px; font-size: 0.87rem; font-weight: 600; cursor: pointer;">
                            <i class="fas fa-save"></i> Simpan Program
                        </button>
                        <a href="{{ route('admin.program.index') }}" class="btn-cancel" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.7rem 1.2rem; background: #fff5f5; border: 1.5px solid #fed7d7; border-radius: 10px; color: #e53e3e; font-size: 0.87rem; font-weight: 600; text-decoration: none;">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
