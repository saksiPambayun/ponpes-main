<!DOCTYPE html>
<html>

<head>
    <title>Kritik & Saran</title>
</head>

<body>
    <h2>Kritik & Saran dari Pengunjung</h2>

    <p><strong>Nama:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>No. Telepon:</strong> {{ $phone ?? 'Tidak diisi' }}</p>

    <h3>Pesan:</h3>
    <p>{{ $message }}</p>

    <hr>
    <small>Dikirim dari halaman Hubungi Kami Pondok Pesantren Al-Ifadah</small>
</body>

</html>