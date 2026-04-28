<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Status Pendaftaran - <?php echo e($registration->nama_lengkap); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background: #fff;
            padding: 20px;
        }

        .print-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #005F02;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #005F02;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header h2 {
            color: #333;
            font-size: 20px;
            font-weight: normal;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 12px;
        }

        /* Status Badge */
        .status-badge {
            text-align: center;
            margin: 20px 0;
            padding: 15px;
            border-radius: 10px;
        }

        .status-accepted {
            background: #d4edda;
            border: 2px solid #155724;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            border: 2px solid #721c24;
            color: #721c24;
        }

        .status-waiting {
            background: #fff3cd;
            border: 2px solid #856404;
            color: #856404;
        }

        .status-pending {
            background: #d1ecf1;
            border: 2px solid #0c5460;
            color: #0c5460;
        }

        .status-badge h3 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .status-badge p {
            font-size: 14px;
        }

        /* Info Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .info-table tr {
            border-bottom: 1px solid #ddd;
        }

        .info-table td {
            padding: 12px 8px;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 35%;
            font-weight: bold;
            color: #555;
            background: #f9f9f9;
        }

        .info-table td:last-child {
            width: 65%;
            color: #333;
        }

        /* Section Title */
        .section-title {
            background: #005F02;
            color: white;
            padding: 8px 15px;
            margin: 20px 0 10px 0;
            font-size: 16px;
            border-radius: 5px;
        }

        /* Catatan */
        .note-box {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #005F02;
            margin: 20px 0;
        }

        .note-box h4 {
            color: #005F02;
            margin-bottom: 8px;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            font-size: 12px;
            color: #666;
        }

        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .signature-box {
            text-align: center;
            width: 200px;
        }

        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #333;
            width: 100%;
        }

        /* Print Styles */
        @media print {
            body {
                padding: 0;
                margin: 0;
            }

            .print-container {
                margin: 0;
                padding: 20px;
            }

            .no-print {
                display: none;
            }

            .status-badge {
                break-inside: avoid;
            }

            .info-table tr {
                break-inside: avoid;
            }
        }

        /* Button Print */
        .print-btn {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-print {
            background: #005F02;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-print:hover {
            background: #0f4d1c;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 95, 2, 0.3);
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            margin-left: 10px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>
    <div class="print-container">
        <!-- Header -->
        <div class="header">
            <h1>PONDOK PESANTREN AL-IFADAH</h1>
            <h2>Lembaga Pendidikan Islam Terpadu</h2>
            <p>Jl. Pendidikan No. 123, Kota Santri | Telp. (021) 1234567 | Email: info@al-ifadah.sch.id</p>
            <p>Website: www.al-ifadah.sch.id</p>
        </div>

        <!-- Status Badge -->
        <div class="status-badge
            <?php if($registration->acceptance_status == 'accepted'): ?> status-accepted
            <?php elseif($registration->acceptance_status == 'rejected'): ?> status-rejected
            <?php elseif($registration->acceptance_status == 'waiting_list'): ?> status-waiting
            <?php else: ?> status-pending
            <?php endif; ?>">
            <?php if($registration->acceptance_status == 'accepted'): ?>
            <h3>✅ SELAMAT! ANDA DITERIMA</h3>
            <p>Dinyatakan LULUS seleksi penerimaan santri baru</p>
            <?php elseif($registration->acceptance_status == 'rejected'): ?>
            <h3>❌ MAAF, PENDAFTARAN ANDA DITOLAK</h3>
            <p>Mohon maaf, berkas Anda belum memenuhi kriteria yang ditentukan</p>
            <?php elseif($registration->acceptance_status == 'waiting_list'): ?>
            <h3>⏳ WAITING LIST</h3>
            <p>Anda masuk dalam daftar tunggu, silakan menunggu konfirmasi lebih lanjut</p>
            <?php else: ?>
            <h3>🔄 PENDAFTARAN SEDANG DIPROSES</h3>
            <p>Berkas Anda sedang dalam proses verifikasi oleh tim admin</p>
            <?php endif; ?>
        </div>

        <!-- Informasi Pendaftaran -->
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
                <td><?php echo e($registration->tempat_lahir ?? '-'); ?><?php echo e($registration->tempat_lahir ? ', ' : ''); ?><?php echo e($registration->tanggal_lahir ? \Carbon\Carbon::parse($registration->tanggal_lahir)->format('d/m/Y')
                    : '-'); ?></td>
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
            <h4>📝 CATATAN PENTING</h4>
            <p><?php echo e($registration->acceptance_note); ?></p>
        </div>
        <?php endif; ?>

        <?php if($registration->acceptance_status == 'accepted'): ?>
        <div class="note-box">
            <h4>📋 LANGKAH SELANJUTNYA</h4>
            <ul style="margin-left: 20px;">
                <li>Silakan melakukan daftar ulang pada tanggal yang telah ditentukan</li>
                <li>Membawa berkas asli untuk verifikasi</li>
                <li>Membayar biaya pendaftaran ulang</li>
                <li>Mengikuti orientasi santri baru</li>
            </ul>
        </div>
        <?php endif; ?>

        <!-- Tanda Tangan -->
        <div class="signature">
            <div class="signature-box">
                <div class="signature-line"></div>
                <p>Kepala Pondok Pesantren Al-Ifadah</p>
                <p><strong>KH. Ahmad Syafi'i, M.Pd</strong></p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Dokumen ini adalah bukti resmi status pendaftaran di Pondok Pesantren Al-Ifadah</p>
            <p>Dicetak pada: <?php echo e(now()->format('d/m/Y H:i:s')); ?></p>
        </div>
    </div>

    <!-- Tombol Cetak (hanya muncul di layar, tidak saat print) -->
    <div class="print-btn no-print">
        <button onclick="window.print()" class="btn-print">
            🖨️ Cetak Surat Keterangan
        </button>
        <a href="<?php echo e(route('user.pendaftaran.status', $registration->id)); ?>" class="btn-back">
            ← Kembali
        </a>
    </div>

    <script>
        // Auto print jika ada parameter print=1
        if (window.location.search.includes('print=1')) {
            window.print();
        }
    </script>
</body>

</html>
<?php /**PATH D:\ponpes-main\resources\views\user\pendaftaran\cetak.blade.php ENDPATH**/ ?>