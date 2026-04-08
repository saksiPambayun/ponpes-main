<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hubungi Kami</title>
    
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
    .hubungi-section{
    background:#fafafa;
    padding:80px 120px;
}

.hubungi-title{
    text-align:center;
    font-size:42px;
    font-weight:700;
    color:#0c6b1c;
    margin-bottom:60px;
}

.hubungi-container{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:60px;
    align-items:start;
}

.contact-card{
    display:flex;
    align-items:center;
    gap:18px;
    background:#c7d9b7;
    padding:18px 22px;
    border-radius:14px;
    margin-bottom:20px;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.contact-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0,0,0,0.25);
}

.contact-card i{
    font-size:28px;
    color:#0c6b1c;
}

.contact-card h3{
    font-size:18px;
    color:#0c6b1c;
    margin:0;
}

.contact-card p{
    font-size:14px;
    margin:3px 0 0 0;
}

.hubungi-form{
    background:white;
    padding:30px;
    border-radius:14px;
    box-shadow:0 6px 15px rgba(0,0,0,0.15);
}

.hubungi-form form{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.hubungi-form input,
.hubungi-form textarea{
    background:#d9e6b7;
    border:none;
    padding:14px 16px;
    border-radius:8px;
    font-size:14px;
}

.hubungi-form textarea{
    height:100px;
    resize:none;
}

.hubungi-form button{
    border:none;
    padding:14px;
    border-radius:8px;
    color:white;
    font-weight:600;
    background:linear-gradient(90deg,#2f6f3c,#cfe39a);
    cursor:pointer;
    transition: 0.3s;
}

.hubungi-form button:hover{
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
</style>
<body>
    @include('components.navbar')
    
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
    @include('components.footer')
</body>
</html>