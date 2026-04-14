@extends('admin.layout')

@section('title', 'Detail Akta Wakaf')
@section('page-title', 'Detail Akta Wakaf')

@section('content')
    <div style="max-width: 80rem; margin: 0 auto;">
        <div style="background: #fff; border-radius: 20px; padding: 2rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #222; margin: 0;">{{ $aktaWakaf->nomor_sertifikat ?? 'Sertifikat Wakaf' }}</h3>
                    <p style="color: #2d2d2d; margin-top: 0.25rem; font-size: 0.8rem;">Dokumen Sertifikat Tanah Wakaf</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div style="background: #f4f4f4; padding: 1rem; border-radius: 12px; border: 1px solid #dfe8d8;">
                    <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Nomor Sertifikat</p>
                    <p style="font-weight: 500; color: #222; margin: 0;">{{ $aktaWakaf->nomor_sertifikat ?? '-' }}</p>
                </div>
                <div style="background: #f4f4f4; padding: 1rem; border-radius: 12px; border: 1px solid #dfe8d8;">
                    <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Nazhir</p>
                    <p style="font-weight: 500; color: #222; margin: 0;">{{ $aktaWakaf->nazhir ?? '-' }}</p>
                </div>
                <div style="background: #f4f4f4; padding: 1rem; border-radius: 12px; border: 1px solid #dfe8d8;">
                    <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Lokasi Tanah</p>
                    <p style="font-weight: 500; color: #222; margin: 0;">{{ $aktaWakaf->lokasi_tanah ?? '-' }}</p>
                </div>
                <div style="background: #f4f4f4; padding: 1rem; border-radius: 12px; border: 1px solid #dfe8d8;">
                    <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Luas Tanah</p>
                    <p style="font-weight: 500; color: #222; margin: 0;">{{ $aktaWakaf->luas_tanah ?? '-' }} m²</p>
                </div>
            </div>

            <div style="border: 1px solid #dfe8d8; border-radius: 16px; padding: 1.5rem; margin-bottom: 2rem;">
                <h4 style="font-size: 0.8rem; color: #2d2d2d; margin-bottom: 1rem; font-weight: 600;">File Sertifikat</h4>
                @if($aktaWakaf->file_sertifikat)
                    <div style="display: flex; align-items: center; justify-content: space-between; background: #eef3ec; padding: 1rem; border-radius: 12px; flex-wrap: wrap; gap: 1rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fas fa-file-pdf" style="color: #dc2626; font-size: 1.8rem;"></i>
                            <div>
                                <p style="font-weight: 500; color: #222; margin: 0;">{{ basename($aktaWakaf->file_sertifikat) }}</p>
                                <p style="font-size: 0.7rem; color: #8cbf73; margin: 0;">Sertifikat Wakaf</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $aktaWakaf->file_sertifikat) }}" target="_blank"
                            style="padding: 0.5rem 1rem; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 10px; color: #fff; font-size: 0.8rem; text-decoration: none; transition: all 0.2s ease; box-shadow: 0 2px 8px rgba(0, 95, 2, 0.3);">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                @else
                    <div style="background: #f4f4f4; padding: 2rem; border-radius: 12px; text-align: center; border: 1px solid #dfe8d8;">
                        <i class="fas fa-file" style="color: #8cbf73; font-size: 2rem; margin-bottom: 0.5rem;"></i>
                        <p style="color: #2d2d2d; margin: 0;">Tidak ada file yang diupload</p>
                    </div>
                @endif
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1.5rem; border-top: 1px solid #dfe8d8; flex-wrap: wrap; gap: 1rem;">
                <a href="{{ route('admin.akta-wakaf.index') }}" style="color: #2d2d2d; text-decoration: none; transition: all 0.2s ease;">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <div style="display: flex; gap: 0.75rem;">
                    <a href="{{ route('admin.akta-wakaf.edit', $aktaWakaf->id) }}"
                        style="padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 10px; color: #fff; text-decoration: none; font-weight: 600; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        a[href*="index"]:hover {
            color: #005F02 !important;
        }
        a[href*="edit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }
        a[href*="download"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.4);
        }
    </style>
@endsection
