@extends('admin.layout')

@section('title', 'Edit Anggota Organisasi')
@section('page-title', 'Edit Anggota Organisasi')

@section('content')

<div class="container-fluid px-4 py-4">

```
{{-- HEADER --}}
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

    <div class="flex items-center gap-3">
        <div class="bg-indigo-100 p-3 rounded-xl">
            <i class="fas fa-user-edit text-indigo-600 text-lg"></i>
        </div>

        <div>
            <h2 class="text-xl font-bold text-gray-800">
                Edit Anggota Organisasi
            </h2>

            {{-- Breadcrumb --}}
            <nav class="text-sm text-gray-500 mt-1">
                <a href="{{ url('/admin/dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                <span class="mx-2">/</span>

                <a href="{{ route('admin.data-master.struktur-organisasi.index') }}" class="hover:text-indigo-600">
                    Struktur Organisasi
                </a>

                <span class="mx-2">/</span>

                <span class="text-indigo-600 font-medium">
                    Edit Anggota
                </span>
            </nav>
        </div>
    </div>

    {{-- BUTTON BACK --}}
    <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
       class="mt-3 md:mt-0 flex items-center gap-2 px-4 py-2 bg-white border rounded-lg shadow-sm hover:bg-gray-50 transition">
        <i class="fas fa-arrow-left text-sm"></i>
        Kembali
    </a>

</div>


{{-- ERROR MESSAGE --}}
@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-6">

    <div class="flex items-start gap-3">

        <i class="fas fa-exclamation-circle mt-1"></i>

        <div>
            <p class="font-semibold mb-1">
                Terjadi kesalahan pada form
            </p>

            <ul class="list-disc ml-5 text-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</div>
@endif


{{-- CARD FORM --}}
<div class="bg-white rounded-xl shadow-md border">

    {{-- CARD HEADER --}}
    <div class="border-b px-6 py-4 flex items-center gap-3 bg-gray-50">

        <i class="fas fa-edit text-indigo-600"></i>

        <div>
            <h3 class="font-semibold text-gray-700">
                Form Edit Data Anggota
            </h3>

            <p class="text-sm text-gray-500">
                Silakan ubah data anggota organisasi pada form di bawah
            </p>
        </div>

    </div>


    {{-- CARD BODY --}}
    <div class="p-6">

        <form action="{{ route('admin.data-master.struktur-organisasi.update', $anggota) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- FORM INPUT --}}
            @include('data-master.struktur-organisasi._form')


            {{-- BUTTON --}}
            <div class="mt-8 flex justify-end gap-3 border-t pt-6">

                <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
                   class="px-5 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow">

                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>
```

</div>
@endsection

@push('scripts')

<script>

function previewFoto(input){

    const wrap = document.getElementById('foto-preview-wrap')
    const img  = document.getElementById('foto-preview')

    if(input.files && input.files[0]){

        const reader = new FileReader()

        reader.onload = function(e){

            img.src = e.target.result
            wrap.classList.remove('hidden')

        }

        reader.readAsDataURL(input.files[0])

    }

}

</script>

@endpush
