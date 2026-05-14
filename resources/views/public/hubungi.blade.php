@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    <section class="hubungi-section">
        <h1 class="hubungi-title">Hubungi Kami</h1>

        <div class="hubungi-container">
            <div class="hubungi-left">
                <div class="contact-card">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                        <h3>Nomor Telepon</h3>
                        <p>{{ $profil->telepon ?? 'Belum diisi' }}</p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-envelope-fill"></i>
                    <div>
                        <h3>Email</h3>
                        <p>{{ $profil->email ?? 'Belum diisi' }}</p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-whatsapp"></i>
                    <div>
                        <h3>Whatsapp</h3>
                        <p>
                            @if(isset($profil) && $profil && $profil->telepon)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->telepon) }}">
                                    {{ $profil->telepon }}
                                </a>
                            @else
                                Belum diisi
                            @endif
                        </p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <h3>Lokasi</h3>
                        <p>{{ $profil->alamat ?? 'Belum diisi' }}</p>
                    </div>
                </div>
            </div>

            <div class="hubungi-form">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('send.feedback') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
                    <input type="email" name="email" placeholder="Alamat Email Anda" value="{{ old('email') }}" required>
                    <input type="text" name="phone" placeholder="No. Telepon" value="{{ old('phone') }}">
                    <textarea name="message" placeholder="Isi Saran dan Kritik Di sini"
                        required>{{ old('message') }}</textarea>
                    <button type="submit">
                        Kirim Saran dan Kritik
                    </button>
                </form>
            </div>
        </div>
    </section>

    <style>
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-danger p {
            margin: 0;
        }
    </style>
@endsection
