<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Legalitas</title>

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
    .legalitas {
        padding: 80px 120px;
        background-color: #fafafa;
    }

    .legalitas-title {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #0b6b1c;
        margin-bottom: 70px;
    }

    .legalitas-wrapper {
        display: flex;
        flex-direction: column;
        gap: 120px;
    }

    .legalitas-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 70px;
    }

    .legalitas-row.reverse {
        flex-direction: row-reverse;
    }

    .legalitas-text {
        max-width: 650px;
    }

    .legalitas-text h2 {
        color: #0b6b1c;
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .legalitas-text p {
        font-size: 18px;
        line-height: 1.7;
        color: #333;
        margin-bottom: 12px;
    }


    .legalitas-box {
        width: 400px;
        height: 500px;
        background: white;
        border: 10px solid #9ac28d;
        border-radius: 14px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        transition: 0.3s;
    }

    .legalitas-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.25);
    }

    .legalitas-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<body>
    @include('components.navbar')

    <section class="legalitas">

        <h1 class="legalitas-title">Legalitas</h1>

        <div class="legalitas-wrapper">
            <div class="legalitas-row">
                <div class="legalitas-box">
                    @if ($aktaYayasan)
                        <img src="{{ asset('storage/' . $aktaYayasan->file_akta) }}">
                    @endif
                </div>

                <div class="legalitas-text">
                    <h2>Akta Yayasan</h2>

                    <p>
                        Yayasan Pondok Pesantren Al-Ifadah didirikan secara resmi berdasarkan
                        Akta Pendirian Yayasan yang diterbitkan pada tahun 20XX oleh notaris
                        yang berwenang. Pendirian yayasan ini dilakukan sebagai bentuk
                        legalitas kelembagaan guna memastikan seluruh kegiatan pendidikan,
                        pengelolaan administrasi, serta operasional pesantren berjalan
                        sesuai dengan ketentuan hukum yang berlaku.
                    </p>

                    <p>
                        Pembentukan yayasan juga bertujuan untuk memberikan landasan hukum
                        yang jelas dalam pengembangan lembaga, meningkatkan profesionalitas
                        tata kelola, serta memperkuat kepercayaan masyarakat terhadap
                        Pondok Pesantren Al-Ifadah sebagai lembaga pendidikan Islam
                        yang sah dan terpercaya.
                    </p>
                </div>
            </div>

            <div class="legalitas-row reverse">
                <div class="legalitas-box">
                    @if ($aktaWakaf)
                        <img src="{{ asset('storage/' . $aktaWakaf->file_sertifikat) }}">
                    @endif
                </div>
                <div class="legalitas-text">
                    <h2>Tanah Waqaf</h2>

                    <p>
                        Yayasan Pondok Pesantren Al-Ifadah didirikan secara resmi berdasarkan
                        Akta Pendirian Yayasan yang diterbitkan pada tahun 20XX oleh notaris
                        yang berwenang. Pendirian yayasan ini dilakukan sebagai bentuk
                        legalitas kelembagaan guna memastikan seluruh kegiatan pendidikan,
                        pengelolaan administrasi, serta operasional pesantren berjalan
                        sesuai dengan ketentuan hukum yang berlaku.
                    </p>

                    <p>
                        Pembentukan yayasan juga bertujuan untuk memberikan landasan hukum
                        yang jelas dalam pengembangan lembaga, meningkatkan profesionalitas
                        tata kelola, serta memperkuat kepercayaan masyarakat terhadap
                        Pondok Pesantren Al-Ifadah sebagai lembaga pendidikan Islam
                        yang sah dan terpercaya.
                    </p>
                </div>
            </div>

            <div class="legalitas-row">
                <div class="legalitas-box">
                    @if ($sk)
                        <img src="{{ asset('storage/' . $sk->file_sk) }}">
                    @endif
                </div>

                <div class="legalitas-text">
                    <h2>SK Pendirian Yayasan</h2>

                    <p>
                        Surat Keputusan (SK) Pendirian Yayasan Pondok Pesantren Al-Ifadah merupakan dokumen resmi yang
                        menjadi dasar hukum berdirinya yayasan sebagai lembaga pendidikan dan sosial yang diakui secara
                        legal oleh instansi berwenang. Penerbitan SK ini bertujuan untuk memberikan legitimasi dalam
                        penyelenggaraan kegiatan pendidikan berbasis keagamaan, pengelolaan santri, serta berbagai
                        aktivitas sosial kemasyarakatan.
                    </p>

                    <p>
                        Dengan adanya SK pendirian tersebut, Yayasan Pondok Pesantren Al-Ifadah memiliki landasan hukum
                        yang jelas dalam menjalankan organisasi, mengembangkan program pendidikan, serta menjalin kerja
                        sama dengan berbagai pihak. Hal ini juga menjadi bentuk komitmen yayasan dalam menerapkan tata
                        kelola yang profesional, transparan, dan berkelanjutan demi kemajuan lembaga.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>

</html>
