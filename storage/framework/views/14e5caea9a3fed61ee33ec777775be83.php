<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Status Pendaftaran - <?php echo e($registration->nama_lengkap); ?></title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #005F02;
            padding-bottom: 10px;
        }

        .header h1 {
            color: #005F02;
            margin: 0;
            font-size: 20px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 16px;
        }

        .header p {
            margin: 0;
            font-size: 10px;
            color: #666;
        }

        .status-badge {
            text-align: center;
            padding: 10px;
            margin: 15px 0;
            border-radius: 8px;
        }

        .status-accepted {
            background: #d4edda;
            border: 1px solid #155724;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            border: 1px solid #721c24;
            color: #721c24;
        }

        .status-waiting {
            background: #fff3cd;
            border: 1px solid #856404;
            color: #856404;
        }

        .status-pending {
            background: #d1ecf1;
            border: 1px solid #0c5460;
            color: #0c5460;
        }

        .section-title {
            background: #005F02;
            color: white;
            padding: 5px 10px;
            margin: 15px 0 10px 0;
            font-size: 12px;
            font-weight: bold;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .info-table td {
            padding: 6px;
            border-bottom: 1px solid #ddd;
        }

        .info-table td:first-child {
            width: 35%;
            font-weight: bold;
            background: #f5f5f5;
        }

        .note-box {
            background: #f9f9f9;
            padding: 10px;
            border-left: 3px solid #005F02;
            margin: 15px 0;
            font-size: 11px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 9px;
            color: #666;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
        }

        .signature-box {
            width: 200px;
            margin-left: auto;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #333;
            margin-top: 40px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>PONDOK PESANTREN AL-IFADAH</h1>
        <h2>Lembaga Pendidikan Islam Terpadu</h2>
        <p>Jl. Pendidikan No. 123, Kota Santri | Telp. (021) 1234567</p>
        <p>Email: info@al-ifadah.sch.id | Website: www.al-ifadah.sch.id</p>
    </div>

    <div class="status-badge
        <?php if($registration->acceptance_status == 'accepted'): ?> status-accepted
        <?php elseif($registration->acceptance_status == 'rejected'): ?> status-rejected
        <?php elseif($registration->acceptance_status == 'waiting_list'): ?> status-waiting
        <?php else: ?> status-pending
        <?php endif; ?>">
        <?php if($registration->acceptance_status == 'accepted'): ?>
            <strong>✅ SELAMAT! ANDA DITERIMA</strong>
        <?php elseif($registration->acceptance_status == 'rejected'): ?>
            <strong>❌ MAAF, PENDAFTARAN ANDA DITOLAK</strong>
        <?php elseif($registration->acceptance_status == 'waiting_list'): ?>
            <strong>⏳ WAITING LIST</strong>
        <?php else: ?>
            <strong>🔄 PENDAFTARAN SEDANG DIPROSES</strong>
        <?php endif; ?>
    </div>

    <div class="section-title">A. DATA PRIBADI</div>
    <table class="info-table">
        <tr>
            <td>Nama Lengkap</td>
            <td><strong><?php echo e($registration->nama_lengkap); ?></strong></td>
        </tr>
        <tr>
            <td>NISN</td>
            <td><?php echo e($registration->nisn ?? '-'); ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td><?php echo e($registration->tempat_lahir ?? '-'); ?>

                <?php echo e($registration->tanggal_lahir ? \Carbon\Carbon::parse($registration->tanggal_lahir)->format('d/m/Y') : '-'); ?>

            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo e($registration->jenis_kelamin ?? '-'); ?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td><?php echo e($registration->asal_sekolah); ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo e($registration->alamat ?? '-'); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo e($registration->email ?? '-'); ?></td>
        </tr>
    </table>

    <div class="section-title">B. DATA ORANG TUA / WALI</div>
    <table class="info-table">
        <tr>
            <td>Nama Wali</td>
            <td><strong><?php echo e($registration->nama_wali); ?></strong></td>
        </tr>
        <tr>
            <td>Pekerjaan Wali</td>
            <td><?php echo e($registration->pekerjaan_wali ?? '-'); ?></td>
        </tr>
        <tr>
            <td>No. Telepon Wali</td>
            <td><?php echo e($registration->no_wali); ?></td>
        </tr>
    </table>

    <div class="section-title">C. INFORMASI PENDAFTARAN</div>
    <table class="info-table">
        <tr>
            <td>Gelombang Pendaftaran</td>
            <td><?php echo e($registration->wave->name ?? '-'); ?></td>
        </tr>
        <tr>
            <td>Tanggal Pendaftaran</td>
            <td><?php echo e($registration->created_at->format('d/m/Y H:i')); ?></td>
        </tr>
        <tr>
            <td>Nomor Pendaftaran</td>
            <td><?php echo e(str_pad($registration->id, 6, '0', STR_PAD_LEFT)); ?></td>
        </tr>
        <?php if($registration->announcement_date): ?>
            <tr>
                <td>Tanggal Pengumuman</td>
                <td><?php echo e(\Carbon\Carbon::parse($registration->announcement_date)->format('d/m/Y H:i')); ?></td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if($registration->acceptance_note): ?>
        <div class="note-box">
            <strong>📝 CATATAN:</strong><br>
            <?php echo e($registration->acceptance_note); ?>

        </div>
    <?php endif; ?>

    <?php if($registration->acceptance_status == 'accepted'): ?>
        <div class="note-box">
            <strong>📋 LANGKAH SELANJUTNYA:</strong><br>
            • Silakan melakukan daftar ulang pada tanggal yang telah ditentukan<br>
            • Membawa berkas asli untuk verifikasi<br>
            • Membayar biaya pendaftaran ulang<br>
            • Mengikuti orientasi santri baru
        </div>
    <?php endif; ?>

    <div class="signature">
        <div class="signature-box">
            <div class="signature-line"></div>
            <strong>KH. Ahmad Syafi'i, M.Pd</strong><br>
            Kepala Pondok Pesantren Al-Ifadah
        </div>
    </div>

    <div class="footer">
        Dokumen ini adalah bukti resmi status pendaftaran di Pondok Pesantren Al-Ifadah<br>
        Dicetak pada: <?php echo e(now()->format('d/m/Y H:i:s')); ?>

    </div>
</body>

</html>
<?php /**PATH D:\ponpes-main\resources\views\user\pendaftaran\pdf.blade.php ENDPATH**/ ?>