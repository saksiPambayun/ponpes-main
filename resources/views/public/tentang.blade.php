@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
    <section class="hero-tentang">
        <div class="hero-overlay">
            <h1 class="hero-title">Tentang Kami</h1>
        </div>
    </section>
    <section class="tentang-section">
        <div class="container">
            <h2 class="judul-tentang">
                Pondok Pesantren Al-Ifadah
            </h2>

            <div class="row align-items-start mb-4">
                <div class="col-lg-7">
                    <img src="{{ asset('images/g2.png') }}" class="foto-besar">
                </div>

                <div class="col-lg-5">
                    <p class="text-tentang">
                        Pondok Pesantren Al-Ifadah didirikan sebagai wujud komitmen dalam menghadirkan pendidikan Islam yang
                        berkualitas serta berorientasi pada pembentukan karakter dan akhlak mulia. Sejak awal berdirinya,
                        pesantren ini memiliki tujuan untuk mencetak generasi yang tidak hanya unggul dalam ilmu
                        pengetahuan, tetapi juga kokoh dalam nilai-nilai keislaman.
                    </p>
                    <p class="text-tentang">
                        Berawal dari semangat dakwah dan kepedulian terhadap pendidikan umat, Pondok Pesantren Al-Ifadah
                        terus berkembang dari waktu ke waktu, baik dari segi program pendidikan, jumlah santri, maupun
                        fasilitas pendukung. Dengan memadukan pendidikan formal dan pembinaan keagamaan, pesantren ini
                        berupaya menciptakan lingkungan belajar yang kondusif, disiplin, serta berlandaskan Al-Qur’an dan
                        Sunnah.
                    </p>
                    <p class="text-tentang">
                        Hingga saat ini, Pondok Pesantren Al-Ifadah senantiasa berkomitmen untuk meningkatkan mutu
                        pendidikan dan pelayanan, demi melahirkan generasi yang berilmu, berakhlak, dan siap berkontribusi
                        bagi masyarakat, bangsa, dan agama.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="card-visi mb-4">
                        <h3>Visi</h3>
                        <p>
                            Menjadi lembaga pendidikan Islam yang unggul dalam membentuk generasi berilmu,
                            berakhlak mulia, dan berwawasan luas berdasarkan Al-Qur’an dan Sunnah.
                        </p>
                    </div>

                    <div class="card-misi">
                        <h3>Misi</h3>
                        <ul>
                            <li>Menyelenggarakan pendidikan Islam terpadu.</li>
                            <li>Membina santri agar berakhlak mulia dan disiplin.</li>
                            <li>Menciptakan lingkungan belajar yang kondusif.</li>
                            <li>Menanamkan nilai kepemimpinan dan kemandirian.</li>
                            <li>Mengembangkan potensi akademik dan keagamaan.</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <img src="{{ asset('images/g6.png') }}" class="foto-kanan">
                </div>
            </div>
        </div>

    </section>

    <section class="adart-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/pict 2.png') }}" class="gambar-adart">
                </div>

                <div class="col-lg-6">
                    <h2 class="judul-adart">
                        Anggaran Dasar & <br>
                        Anggaran Rumah Tangga <br>
                        (AD/ART)
                    </h2>
                    <p class="text-adart">
                        Anggaran Dasar dan Anggaran Rumah Tangga (AD/ART) Pondok Pesantren
                        Al-Ifadah merupakan pedoman resmi dalam penyelenggaraan tata kelola
                        kelembagaan.
                    </p>
                    <p class="text-adart">
                        Dokumen ini disusun berdasarkan prinsip-prinsip syariat Islam
                        dan peraturan yang berlaku guna menjaga profesionalitas,
                        transparansi, dan keberlangsungan lembaga.
                    </p>
                    <a href="#" class="btn-adart">
                        Unduh Dokumen AD / ART
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="struktur-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="judul-struktur">
                        Struktur Organisasi
                    </h2>

                    <p class="text-struktur">
                        Struktur Organisasi Pondok Pesantren Al-Ifadah disusun sebagai bentuk
                        tata kelola kelembagaan yang terarah dan profesional. Struktur ini
                        mencakup unsur pembina, pimpinan pondok, serta bidang-bidang pendukung
                        yang memiliki tugas dan tanggung jawab masing-masing.
                    </p>

                    <p class="text-struktur">
                        Dengan adanya pembagian peran yang jelas diharapkan seluruh program
                        pendidikan dan pembinaan santri dapat terlaksana secara efektif,
                        tertib, dan sesuai dengan visi serta misi lembaga.
                    </p>
                </div>

                <div class="col-lg-6">
                    <a href="{{ route('struktur') }}" class="struktur-card">
                        <img src="{{ asset('images/struktur1.png') }}" alt="Struktur Organisasi">
                        <div class="struktur-overlay">
                            <span>Lihat Struktur Organisasi</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="legalitas-section">
        <div class="container text-center">
            <h2 class="judul-legalitas">Legalitas</h2>
            <p class="deskripsi-legalitas">
                Pondok Pesantren Al-Ifadah telah memiliki legalitas resmi dan terdaftar
                sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.
            </p>


            <div class="row justify-content-center mt-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            <img src="{{ asset('images/1.png') }}" alt="Akta Yayasan">
                        </div>
                        <h5>Akta Yayasan</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            <img src="{{ asset('images/2.png') }}" alt="Izin Operasional">
                        </div>
                        <h5>Tanah Waqaf</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            <img src="{{ asset('images/1.png') }}" alt="SK Mendirikan Yayasan">
                        </div>
                        <h5>SK Mendirikan Yayasan</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            <img src="{{ asset('images/2.png') }}" alt="Akta Yayasan">
                        </div>
                        <h5>Akta Yayasan</h5>
                    </div>
                </div>
            </div>


            <a href="{{ route('legalitas') }}" class="btn-legalitas">
                Lihat Legalitas Yayasan
            </a>

        </div>

    </section>

@endsection
