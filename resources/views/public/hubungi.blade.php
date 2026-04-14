@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')

    <section class="hubungi-section">
        <h1 class="hubungi-title">Hubungi</h1>

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
                            <a href="https://wa.me/{{ $profil->telepon }}">
                                {{ $profil->telepon }}
                            </a>
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
                    <div
                        style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div
                        style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        @foreach($errors->all() as $error)
                            <p style="margin: 0;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('send.feedback') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
                    <input type="email" name="email" placeholder="Alamat Email Anda" value="{{ old('email') }}"
                        required>
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

    @endsection