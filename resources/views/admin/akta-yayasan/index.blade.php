@extends('admin.layout')

@section('title', 'Akta Yayasan')
@section('page-title', 'Dokumen Akta Yayasan')

@section('content')
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-scroll" style="color: #fff;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Akta Yayasan</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;">Daftar dokumen legalitas yayasan</p>
                </div>
            </div>
            <a href="{{ route('admin.akta-yayasan.create') }}" class="btn-primary-action"
                style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; padding: 0.6rem 1.2rem; border-radius: 10px; text-decoration: none; transition: all 0.2s ease;">
                <i class="fas fa-plus"></i> Tambah Akta
            </a>
        </div>

        <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
            @forelse($aktaYayasan as $item)
                <div class="card"
                    style="background: #fff; border-radius: 20px; border-top: 4px solid #005F02; padding: 1.5rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06); transition: all 0.2s ease;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                        <div style="padding: 0.75rem; background: #eef3ec; color: #005F02; border-radius: 12px;">
                            <i class="fas fa-gavel" style="font-size: 1.2rem;"></i>
                        </div>
                        <span style="font-size: 0.7rem; font-family: monospace; color: #8cbf73;">#{{ $item->id }}</span>
                    </div>
                    <h4 style="font-size: 1rem; font-weight: 700; color: #222; line-height: 1.4; margin-bottom: 0.5rem;">
                        {{ $item->nomor_akta ?? '-' }}</h4>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin-bottom: 0.25rem;"><span
                            style="font-weight: 600;">Tanggal:</span>
                        {{ $item->tanggal_akta ? \Carbon\Carbon::parse($item->tanggal_akta)->format('d/m/Y') : '-' }}</p>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin-bottom: 1rem;"><span
                            style="font-weight: 600;">Notaris:</span>
                        {{ $item->notaris ?? '-' }}</p>

                    <div
                        style="display: flex; align-items: center; justify-content: space-between; padding-top: 1rem; border-top: 1px solid #dfe8d8;">
                        @if($item->file_akta)
                            <a href="{{ asset('storage/' . $item->file_akta) }}" target="_blank"
                                style="color: #005F02; text-decoration: none; font-size: 0.8rem; font-weight: 500; transition: all 0.2s ease;">
                                <i class="fas fa-download mr-1"></i> Lihat File
                            </a>
                        @else
                            <span style="color: #8cbf73; font-size: 0.75rem; font-style: italic;">Tidak ada file</span>
                        @endif

                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.akta-yayasan.edit', $item->id) }}"
                                style="color: #2d2d2d; transition: all 0.2s ease;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.akta-yayasan.destroy', $item->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: #2d2d2d; transition: all 0.2s ease;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 card"
                    style="grid-column: 1 / -1; background: #fff; border-radius: 20px; padding: 3rem; text-align: center; color: #2d2d2d; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
                    <i class="fas fa-scroll" style="font-size: 3rem; margin-bottom: 1rem; color: #8cbf73;"></i>
                    <p style="color: #2d2d2d;">Belum ada data Akta Yayasan.</p>
                </div>
            @endforelse
        </div>

        @if($aktaYayasan->hasPages())
            <div style="margin-top: 1.5rem;">
                {{ $aktaYayasan->links() }}
            </div>
        @endif
    </div>

    <style>
        .btn-primary-action:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.3);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
        }

        .card a[href*="edit"]:hover,
        .card button:hover {
            color: #005F02 !important;
        }

        .card button:hover i,
        .card a[href*="edit"]:hover i {
            color: #005F02;
        }

        .card a[href*="download"]:hover,
        .card a[href*="lihat"]:hover {
            color: #0d4f14 !important;
        }

        /* Pagination Styling */
        .pagination {
            margin: 0;
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .pagination .page-link {
            border: 1px solid #dfe8d8;
            color: #2d2d2d;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
        }

        .pagination .page-link:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            border-color: #005F02;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.45;
            pointer-events: none;
        }
    </style>
@endsection
