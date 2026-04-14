@extends('admin.layout')

@section('title', 'Edit Anggota Organisasi')
@section('page-title', 'Edit Anggota Organisasi')

@section('content')

    <div class="container-fluid px-4 py-4">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

            <div class="flex items-center gap-3">
                <div class="bg-green-100 p-3 rounded-xl">
                    <i class="fas fa-user-edit text-green-700 text-lg"></i>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        Edit Anggota Organisasi
                    </h2>

                    {{-- Breadcrumb --}}
                    <nav class="text-sm text-gray-500 mt-1">
                        <a href="{{ url('/admin/dashboard') }}" class="hover:text-green-700">Dashboard</a>
                        <span class="mx-2">/</span>

                        <a href="{{ route('admin.data-master.struktur-organisasi.index') }}" class="hover:text-green-700">
                            Struktur Organisasi
                        </a>

                        <span class="mx-2">/</span>

                        <span class="text-green-700 font-medium">
                            Edit Anggota
                        </span>
                    </nav>
                </div>
            </div>

            {{-- BUTTON BACK --}}
            <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
                class="mt-3 md:mt-0 flex items-center gap-2 px-4 py-2 bg-white border rounded-lg shadow-sm hover:bg-gray-50 transition"
                style="border-color: #dfe8d8; border-radius: 10px;">
                <i class="fas fa-arrow-left text-sm"></i>
                Kembali
            </a>

        </div>

        {{-- ERROR MESSAGE --}}
        @if($errors->any())
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 mb-6"
                style="background: #eef3ec; border-color: #dfe8d8;">

                <div class="flex items-start gap-3">

                    <i class="fas fa-exclamation-circle mt-1" style="color: #005F02;"></i>

                    <div>
                        <p class="font-semibold mb-1" style="color: #0d4f14;">
                            Terjadi kesalahan pada form
                        </p>

                        <ul class="list-disc ml-5 text-sm" style="color: #2d2d2d;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
        @endif

        {{-- CARD FORM --}}
        <div class="bg-white rounded-xl shadow-md border"
            style="border-color: #dfe8d8; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">

            {{-- CARD HEADER --}}
            <div class="border-b px-6 py-4 flex items-center gap-3"
                style="background: #eef3ec; border-color: #dfe8d8; border-radius: 20px 20px 0 0;">

                <i class="fas fa-edit" style="color: #005F02;"></i>

                <div>
                    <h3 class="font-semibold" style="color: #222;">
                        Form Edit Data Anggota
                    </h3>

                    <p class="text-sm" style="color: #2d2d2d;">
                        Silakan ubah data anggota organisasi pada form di bawah
                    </p>
                </div>

            </div>

            {{-- CARD BODY --}}
            <div class="p-6">

                <form action="{{ route('admin.data-master.struktur-organisasi.update', $anggota) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- FORM INPUT --}}
                    @include('admin.data-master.struktur-organisasi._form')

                    {{-- BUTTON --}}
                    <div class="mt-8 flex justify-end gap-3 border-t pt-6" style="border-color: #dfe8d8;">

                        <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
                            class="px-5 py-2 rounded-lg border transition"
                            style="border-color: #dfe8d8; color: #2d2d2d; border-radius: 10px; background: white;"
                            onmouseover="this.style.background='#eef3ec'" onmouseout="this.style.background='white'">
                            Batal
                        </a>

                        <button type="submit" class="px-6 py-2 rounded-lg transition shadow"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c); color: white; border-radius: 10px;"
                            onmouseover="this.style.background='linear-gradient(135deg, #0d4f14, #0f4d1c)'"
                            onmouseout="this.style.background='linear-gradient(135deg, #005F02, #0f4d1c)'">

                            <i class="fas fa-save mr-2"></i>
                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection

@push('scripts')

    <script>

        function previewFoto(input) {

            const wrap = document.getElementById('foto-preview-wrap')
            const img = document.getElementById('foto-preview')

            if (input.files && input.files[0]) {

                const reader = new FileReader()

                reader.onload = function (e) {

                    img.src = e.target.result
                    wrap.classList.remove('hidden')

                }

                reader.readAsDataURL(input.files[0])

            }

        }

    </script>

@endpush