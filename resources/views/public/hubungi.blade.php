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
                    <p>0819-1234-0987</p>
                </div>
            </div>

            <div class="contact-card">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h3>Email</h3>
                    <p>ponpes.alifadah@gmail.com</p>
                </div>
            </div>

            <div class="contact-card">
                <i class="bi bi-whatsapp"></i>
                <div>
                    <h3>Whatsapp</h3>
                    <p>0819-1234-0987</p>
                </div>
            </div>

            <div class="contact-card">
                <i class="bi bi-geo-alt-fill"></i>
                <div>
                    <h3>Lokasi</h3>
                    <p>
                        Dusun Sumberjo, Desa Glundengan, Kecamatan Wuluhan,
                        Kabupaten Jember, Jawa Timur 68162
                    </p>
                </div>
            </div>
        </div>

        <div class="hubungi-form">
            <form>
                <input type="text" placeholder="Nama Anda">
                <input type="email" placeholder="Alamat Email Anda">
                <input type="text" placeholder="No. Telepon">
                <textarea placeholder="Isi Saran dan Kritik Di sini"></textarea>
                <button type="submit">
                    Isi Formulir Pendaftaran
                </button>
            </form>
        </div>
    </div>
</section>
@endsection