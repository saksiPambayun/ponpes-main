<!DOCTYPE html>
<html>

<head>
    <title>Kritik & Saran</title>
</head>

<body>
    <h2>Kritik & Saran dari Pengunjung</h2>

    <p><strong>Nama:</strong> <?php echo e($name); ?></p>
    <p><strong>Email:</strong> <?php echo e($email); ?></p>
    <p><strong>No. Telepon:</strong> <?php echo e($phone ?? 'Tidak diisi'); ?></p>

    <h3>Pesan:</h3>
    <p><?php echo e($message); ?></p>

    <hr>
    <small>Dikirim dari halaman Hubungi Kami Pondok Pesantren Al-Ifadah</small>
</body>

</html><?php /**PATH C:\laragon\www\ponpes-main\resources\views/emails/feedback.blade.php ENDPATH**/ ?>