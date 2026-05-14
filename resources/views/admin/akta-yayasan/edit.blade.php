@extends('admin.layout')

@section('title', 'Edit Akta Yayasan')
@section('page-title', 'Edit Akta Yayasan')

@section('content')
    <div style="max-width: 80rem; margin: 0 auto;">
        <div
            style="background: #fff; border-radius: 20px; padding: 2rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <form action="{{ route('admin.akta-yayasan.update', $aktaYayasan->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Nomor
                            Akta</label>
                        <input type="text" name="nomor_akta" value="{{ old('nomor_akta', $aktaYayasan->nomor_akta) }}"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Tanggal
                            Akta</label>
                        <input type="date" name="tanggal_akta" value="{{ old('tanggal_akta', $aktaYayasan->tanggal_akta) }}"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Notaris</label>
                        <input type="text" name="notaris" value="{{ old('notaris', $aktaYayasan->notaris) }}"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $aktaYayasan->judul) }}"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            placeholder="Contoh: Akta Yayasan"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; resize: vertical; transition: all 0.2s ease;"
                            placeholder="Masukkan deskripsi..."
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">{{ old('deskripsi', $aktaYayasan->deskripsi) }}</textarea>
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Upload
                            File Akta (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="file_akta" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;">
                        @if ($aktaYayasan->file_akta)
                            <p style="font-size: 0.7rem; color: #8cbf73; margin-top: 0.5rem;">File saat ini:
                                {{ basename($aktaYayasan->file_akta) }}</p>
                            <a href="{{ asset('storage/' . $aktaYayasan->file_akta) }}" target="_blank"
                                style="color: #005F02; font-size: 0.7rem; text-decoration: none; transition: all 0.2s ease;">
                                <i class="fas fa-download mr-1"></i>Download File
                            </a>
                        @endif
                        <p style="font-size: 0.7rem; color: #8cbf73; margin-top: 0.5rem;">Format: JPG, PNG, JPEG, PDF, DOC,
                            DOCX (Max: 5MB)</p>
                        @error('file_akta')
                            <p style="color: #dc2626; font-size: 0.7rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="margin-top: 2rem; display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="{{ route('admin.akta-yayasan.index') }}"
                        style="padding: 0.7rem 1.5rem; border: 1.5px solid #dfe8d8; border-radius: 10px; color: #2d2d2d; text-decoration: none; font-weight: 600; transition: all 0.2s ease;">Batal</a>
                    <button type="submit"
                        style="padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); border: none; border-radius: 10px; color: #fff; font-weight: 600; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        a[href*="index"]:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }

        a[href*="download"]:hover {
            color: #0d4f14 !important;
            text-decoration: underline !important;
        }
    </style>
@endsection