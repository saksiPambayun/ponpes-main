<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cabin:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<style>
    .hero-tentang {
        height: 650px;
        background-image: url("/images/hero.png");
        background-size: cover;
        background-position: center;
        position: relative;
        font-family: "Cabin", sans-serif;
    }

    .hero-overlay {
        height: 100%;
        width: 100%;
        background: rgba(22, 101, 52, 0.45);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .hero-title {
        font-size: 64px;
        color: white;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .tentang-section {
        padding: 80px 0;
    }

    .judul-tentang {
        text-align: center;
        font-size: 38px;
        font-weight: 700;
        color: #0c6b1f;
        margin-bottom: 50px;
    }

    .foto-besar {
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .foto-kanan {
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        margin-top: 80px;
    }

    .text-tentang {
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .card-visi,
    .card-misi {
        background: #dfe7dc;
        padding: 30px;
        border-radius: 16px;
        transition: 0.3s;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-visi h3,
    .card-misi h3 {
        color: #0c6b1f;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .card-misi ul {
        padding-left: 18px;
    }

    .card-misi li {
        margin-bottom: 8px;
    }

    .card-visi:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-misi:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .adart-section {
        padding: 100px 0;
    }

    .gambar-adart {
        width: 100%;
        max-width: 567px;
        display: block;
        margin: auto;
    }

    .judul-adart {
        color: #0f6b1e;
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .text-adart {
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 15px;
        color: #333;
    }

    .btn-adart {
        display: inline-block;
        margin-top: 10px;
        padding: 12px 32px;
        border-radius: 10px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-adart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .struktur-section {
        padding: 100px 0;
    }

    .judul-struktur {
        font-size: 32px;
        font-weight: 700;
        color: #0f6b1e;
        margin-bottom: 20px;
    }

    .text-struktur {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 15px;
        color: #333;
    }

    .struktur-card {
        position: relative;
        display: block;
        background: #e6efd8;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        overflow: hidden;
    }

    .struktur-card img {
        width: 100%;
        border-radius: 10px;
        transition: 0.4s;
        filter: blur(2px);
    }

    .struktur-card img:hover {
        filter: blur(0px);
    }

    .struktur-overlay {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 8px;
        font-weight: 500;
        opacity: 0;
        transition: 0.3s;
    }

    .struktur-card:hover img {
        transform: scale(1.05);
    }

    .struktur-card:hover .struktur-overlay {
        opacity: 1;
    }

    .legalitas-section {
        padding: 100px 0;
        background: #e9f0e4;
    }

    .judul-legalitas {
        font-size: 34px;
        font-weight: 700;
        color: #0f6b1e;
        margin-bottom: 10px;
    }

    .deskripsi-legalitas {
        max-width: 700px;
        margin: auto;
        font-size: 15px;
        color: #333;
    }

    .legalitas-card {
        background: #f5f5f5;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        transition: 0.3s;
    }

    .legalitas-card:hover {
        transform: translateY(-6px);
    }

    .legalitas-img {
        height: 180px;
        background: #9bbf84;
        border-radius: 14px;
        margin-bottom: 15px;
    }

    .legalitas-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .legalitas-card h5 {
        color: #0f6b1e;
        font-weight: 600;
    }

    .btn-legalitas {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 40px;
        border-radius: 10px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-legalitas:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
</style>

<body>
    @include('components.navbar')
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
                        Pondok Pesantren Al-Ifadah didirikan sebagai wujud komitmen dalam menghadirkan pendidikan Islam
                        yang
                        berkualitas serta berorientasi pada pembentukan karakter dan akhlak mulia. Sejak awal
                        berdirinya,
                        pesantren ini memiliki tujuan untuk mencetak generasi yang tidak hanya unggul dalam ilmu
                        pengetahuan, tetapi juga kokoh dalam nilai-nilai keislaman.
                    </p>
                    <p class="text-tentang">
                        Berawal dari semangat dakwah dan kepedulian terhadap pendidikan umat, Pondok Pesantren Al-Ifadah
                        terus berkembang dari waktu ke waktu, baik dari segi program pendidikan, jumlah santri, maupun
                        fasilitas pendukung. Dengan memadukan pendidikan formal dan pembinaan keagamaan, pesantren ini
                        berupaya menciptakan lingkungan belajar yang kondusif, disiplin, serta berlandaskan Al-Qur’an
                        dan
                        Sunnah.
                    </p>
                    <p class="text-tentang">
                        Hingga saat ini, Pondok Pesantren Al-Ifadah senantiasa berkomitmen untuk meningkatkan mutu
                        pendidikan dan pelayanan, demi melahirkan generasi yang berilmu, berakhlak, dan siap
                        berkontribusi
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
                    <a href="{{ route('tentang') }}" class="btn-adart">
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
                            @if ($aktaYayasan)
                                <img src="{{ asset('storage/' . $aktaYayasan->file_akta) }}">
                            @endif
                        </div>
                        <h5>Akta Yayasan</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            @if ($aktaWakaf)
                                <img src="{{ asset('storage/' . $aktaWakaf->file_sertifikat) }}">
                            @endif
                        </div>
                        <h5>Tanah Waqaf</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="legalitas-card">
                        <div class="legalitas-img">
                            @if ($sk)
                                <img src="{{ asset('storage/' . $sk->file_sk) }}">
                            @endif
                        </div>
                        <h5>SK Pendirian Yayasan</h5>
                    </div>
                </div>

            </div>


            <a href="{{ route('legalitas') }}" class="btn-legalitas">
                Lihat Legalitas Yayasan
            </a>

        </div>

    </section>
    @include('components.footer')
</body>

</html>
