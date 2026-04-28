<?php $__env->startSection('title', 'Kelola Pengumuman'); ?>
<?php $__env->startSection('page-title', 'Kelola Pengumuman Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <div class="card" style="background: #fff; border-radius: 20px;">
        <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
            <h3 class="font-bold">Publikasi Pengumuman</h3>
        </div>
        <div class="p-6">
            <form action="" method="POST" id="publishForm">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Pilih Gelombang <span class="text-red-500">*</span></label>
                    <select name="wave_id" id="wave_select" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Pilih Gelombang --</option>
                        <?php $__currentLoopData = $waves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($wave->id); ?>">
                                <?php echo e($wave->name); ?> (<?php echo e(\Carbon\Carbon::parse($wave->start_date)->format('d/m/Y')); ?> - <?php echo e(\Carbon\Carbon::parse($wave->end_date)->format('d/m/Y')); ?>)
                                <?php if($wave->is_active): ?> - Aktif <?php endif; ?>
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Tanggal Pengumuman <span class="text-red-500">*</span></label>
                    <input type="date" name="publish_date" id="publish_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="<?php echo e(date('Y-m-d')); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Judul Pengumuman <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="announcement_title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           placeholder="Contoh: Hasil Seleksi Penerimaan Santri Baru Gelombang 1" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Isi Pengumuman <span class="text-red-500">*</span></label>
                    <textarea name="announcement_text" id="announcement_text" rows="6" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                              placeholder="Tulis pengumuman hasil seleksi..." required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Catatan Tambahan (Opsional)</label>
                    <textarea name="additional_notes" id="additional_notes" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                              placeholder="Informasi tambahan seperti jadwal daftar ulang, dll..."></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 rounded-lg text-white" style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
                        <i class="fas fa-paper-plane mr-2"></i>Publikasikan
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="card" style="background: #fff; border-radius: 20px;">
        <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
            <h3 class="font-bold">Preview Pengumuman</h3>
        </div>
        <div class="p-6" id="previewContainer">
            <div class="text-center text-gray-500 py-10">
                <i class="fas fa-eye-slash text-4xl mb-3"></i>
                <p>Pilih gelombang untuk melihat preview</p>
            </div>
        </div>
    </div>
</div>


<div class="card mt-6" style="background: #fff; border-radius: 20px;">
    <div class="p-6 border-b flex justify-between items-center" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
        <h3 class="font-bold">Riwayat Pengumuman</h3>
        <button onclick="printAnnouncement()" class="px-3 py-1 text-sm rounded-lg border" style="border-color: #005F02; color: #005F02;">
            <i class="fas fa-print mr-1"></i> Cetak
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y">
            <thead style="background: #f4f4f4;">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Gelombang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Tanggal Pengumuman</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Total Pendaftar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm"><?php echo e($index + 1); ?></td>
                    <td class="px-6 py-4">
                        <div class="font-medium"><?php echo e($announcement['wave_name']); ?></div>
                    </td>
                    <td class="px-6 py-4 text-sm"><?php echo e(\Carbon\Carbon::parse($announcement['publish_date'])->format('d/m/Y H:i')); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e(Str::limit($announcement['title'], 50)); ?></td>
                    <td class="px-6 py-4 text-sm"><?php echo e($announcement['total_students']); ?> orang</td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button onclick="viewAnnouncementDetail(<?php echo e(json_encode($announcement)); ?>)" class="text-blue-600 hover:text-blue-800" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="printSpecificAnnouncement(<?php echo e(json_encode($announcement)); ?>)" class="text-green-600 hover:text-green-800" title="Cetak">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-3 d-block"></i>
                        <p>Belum ada pengumuman yang dipublikasikan</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t">
        <?php echo e($registrations->links()); ?>

    </div>
</div>


<div id="announcementModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" style="display: none;">
    <div class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white p-4 border-b flex justify-between items-center" style="background: #eef3ec;">
            <h3 class="text-xl font-bold" id="modalTitle">Detail Pengumuman</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="p-6" id="modalContent">
            <!-- Content will be filled by JavaScript -->
        </div>
        <div class="p-4 border-t flex justify-end">
            <button onclick="printModalContent()" class="px-4 py-2 rounded-lg text-white mr-2" style="background: #005F02;">
                <i class="fas fa-print mr-2"></i>Cetak
            </button>
            <button onclick="closeModal()" class="px-4 py-2 border rounded-lg">Tutup</button>
        </div>
    </div>
</div>

<style>
    .announcement-preview {
        font-family: 'Times New Roman', serif;
    }
    .announcement-preview h4 {
        color: #005F02;
    }
    .announcement-preview .header-logo {
        text-align: center;
        margin-bottom: 20px;
    }
    .announcement-preview .header-logo h2 {
        margin: 0;
        color: #005F02;
    }
    .announcement-preview .header-logo p {
        margin: 5px 0;
    }
    .announcement-preview .title {
        text-align: center;
        text-decoration: underline;
        margin: 20px 0;
    }
    .announcement-preview table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    .announcement-preview table th,
    .announcement-preview table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .announcement-preview table th {
        background: #f5f5f5;
    }
    .announcement-preview .footer {
        margin-top: 30px;
        text-align: right;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        .modal-content, .modal-content * {
            visibility: visible;
        }
        .modal-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        button {
            display: none;
        }
    }
</style>

<script>
const waveSelect = document.getElementById('wave_select');
const previewContainer = document.getElementById('previewContainer');
const publishForm = document.getElementById('publishForm');
const titleInput = document.getElementById('announcement_title');
const textInput = document.getElementById('announcement_text');
const notesInput = document.getElementById('additional_notes');
const publishDate = document.getElementById('publish_date');

// Preview ketika memilih gelombang
waveSelect.addEventListener('change', async function() {
    const waveId = this.value;
    if (!waveId) {
        previewContainer.innerHTML = `
            <div class="text-center text-gray-500 py-10">
                <i class="fas fa-eye-slash text-4xl mb-3"></i>
                <p>Pilih gelombang untuk melihat preview</p>
            </div>
        `;
        return;
    }

    // Set default title jika kosong
    const waveName = waveSelect.options[waveSelect.selectedIndex]?.text.split(' ')[0] || 'Gelombang';
    if (!titleInput.value) {
        titleInput.value = `Hasil Seleksi Penerimaan Santri Baru ${waveName}`;
    }

    try {
        const response = await fetch(`/admin/pendaftaran/announcement/preview/${waveId}`);
        const data = await response.json();

        let html = `
            <div class="announcement-preview">
                <div class="header-logo">
                    <h2>PONDOK PESANTREN AL IFADAH</h2>
                    <p>Jl. Pendidikan No. 123, Kota Santri</p>
                    <p>Telp. (021) 1234567 | Email: info@al-ifadah.sch.id</p>
                    <hr style="margin: 10px 0;">
                </div>
                <div class="text-center mb-4">
                    <h4 class="font-bold text-lg">PENGUMUMAN</h4>
                    <p>Nomor: ${Math.floor(Math.random() * 1000)}/PP.ALF/${new Date().getFullYear()}</p>
                </div>
                <div class="mb-4">
                    <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
                    <p>Berdasarkan hasil seleksi penerimaan santri baru Tahun Ajaran ${new Date().getFullYear()}/${new Date().getFullYear() + 1}, dengan ini diumumkan hasil seleksi sebagai berikut:</p>
                </div>
                <div class="title">
                    <h4>HASIL SELEKSI PENERIMAAN SANTRI BARU</h4>
                    <p>Gelombang: ${data.wave_name}</p>
                    <p>Tanggal Pengumuman: ${new Date().toLocaleDateString('id-ID')}</p>
                </div>
        `;

        if (data.registrations.length === 0) {
            html += `<p class="text-center text-gray-500 py-4">Belum ada pendaftar yang diproses di gelombang ini</p>`;
        } else {
            // Hitung statistik
            const accepted = data.registrations.filter(r => r.acceptance_status === 'accepted').length;
            const rejected = data.registrations.filter(r => r.acceptance_status === 'rejected').length;
            const waiting = data.registrations.filter(r => r.acceptance_status === 'waiting_list').length;

            html += `
                <div class="mb-4 p-3" style="background: #f5f5f5;">
                    <p><strong>Statistik:</strong></p>
                    <p>✅ Diterima: ${accepted} orang</p>
                    <p>❌ Ditolak: ${rejected} orang</p>
                    <p>⏳ Waiting List: ${waiting} orang</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>`;

            data.registrations.forEach((reg, index) => {
                let statusClass = reg.acceptance_status === 'accepted' ? 'style="color: green; font-weight: bold;"' :
                                 (reg.acceptance_status === 'rejected' ? 'style="color: red; font-weight: bold;"' : 'style="color: orange; font-weight: bold;"');
                let statusText = reg.acceptance_status === 'accepted' ? 'DITERIMA' :
                                (reg.acceptance_status === 'rejected' ? 'DITOLAK' : 'WAITING LIST');
                let keterangan = reg.acceptance_status === 'accepted' ? 'Silakan lakukan daftar ulang' :
                                (reg.acceptance_status === 'rejected' ? 'Maaf, berkas tidak memenuhi syarat' : 'Menunggu konfirmasi lebih lanjut');

                html += `<tr>
                            <td>${index + 1}</td>
                            <td>${reg.nama_lengkap}</td>
                            <td>${reg.asal_sekolah}</td>
                            <td ${statusClass}>${statusText}</td>
                            <td>${keterangan}</td>
                          </tr>`;
            });

            html += `</tbody>
                    </table>`;
        }

        html += `
                <div class="mt-4">
                    <p>Demikian pengumuman ini disampaikan. Atas perhatiannya, kami ucapkan terima kasih.</p>
                </div>
                <div class="footer">
                    <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh,</p>
                    <p class="mt-4">Kepala Pondok Pesantren Al Ifadah</p>
                    <p class="mt-4"><br><br></p>
                    <p><strong>KH. Ahmad Syafi'i, M.Pd</strong></p>
                </div>
            </div>
        `;

        previewContainer.innerHTML = html;

        // Update action form
        publishForm.action = `/admin/pendaftaran/announcement/${waveId}/publish`;
    } catch (error) {
        console.error('Error:', error);
        previewContainer.innerHTML = `
            <div class="text-center text-red-500 py-10">
                <i class="fas fa-exclamation-triangle text-4xl mb-3"></i>
                <p>Gagal memuat preview. Pastikan ada data pendaftar.</p>
            </div>
        `;
    }
});

// Live preview update ketika mengetik
titleInput.addEventListener('input', updatePreviewText);
textInput.addEventListener('input', updatePreviewText);
notesInput.addEventListener('input', updatePreviewText);
publishDate.addEventListener('change', updatePreviewText);

function updatePreviewText() {
    const waveId = waveSelect.value;
    if (!waveId) return;

    // Trigger refresh preview
    const event = new Event('change');
    waveSelect.dispatchEvent(event);
}

// View announcement detail
function viewAnnouncementDetail(announcement) {
    const modal = document.getElementById('announcementModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');

    modalTitle.innerText = announcement.title;

    let html = `
        <div class="announcement-preview">
            <div class="header-logo">
                <h2>PONDOK PESANTREN AL IFADAH</h2>
                <p>Jl. Pendidikan No. 123, Kota Santri</p>
                <p>Telp. (021) 1234567 | Email: info@al-ifadah.sch.id</p>
                <hr>
            </div>
            <div class="text-center mb-4">
                <h4 class="font-bold text-lg">PENGUMUMAN</h4>
            </div>
            <div class="mb-4">
                <p><strong>Nomor:</strong> ${announcement.number || '---'}</p>
                <p><strong>Tanggal:</strong> ${new Date(announcement.publish_date).toLocaleDateString('id-ID')}</p>
            </div>
            <div class="mb-4">
                <h4 class="font-semibold">${announcement.title}</h4>
                <p>${announcement.content || announcement.text || ''}</p>
            </div>
    `;

    if (announcement.students && announcement.students.length > 0) {
        html += `
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
        `;
        announcement.students.forEach((student, idx) => {
            html += `
                <tr>
                    <td>${idx + 1}</td>
                    <td>${student.name}</td>
                    <td>${student.school}</td>
                    <td>${student.status}</td>
                </tr>
            `;
        });
        html += `</tbody></table>`;
    }

    if (announcement.notes) {
        html += `<div class="mt-4"><p><strong>Catatan:</strong> ${announcement.notes}</p></div>`;
    }

    html += `
            <div class="footer mt-4">
                <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh,</p>
                <p class="mt-4">Kepala Pondok Pesantren Al Ifadah</p>
                <p class="mt-4"><br><br></p>
                <p><strong>KH. Ahmad Syafi'i, M.Pd</strong></p>
            </div>
        </div>
    `;

    modalContent.innerHTML = html;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('announcementModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function printModalContent() {
    const content = document.getElementById('modalContent').innerHTML;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Pengumuman</title>
                <style>
                    body { font-family: 'Times New Roman', serif; padding: 40px; }
                    .header-logo { text-align: center; margin-bottom: 20px; }
                    .header-logo h2 { margin: 0; color: #005F02; }
                    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                    table th, table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    table th { background: #f5f5f5; }
                    .footer { margin-top: 30px; text-align: right; }
                    @media print {
                        body { margin: 0; padding: 20px; }
                    }
                </style>
            </head>
            <body>
                ${content}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

function printAnnouncement() {
    const previewContent = previewContainer.innerHTML;
    if (!previewContent || previewContent.includes('Pilih gelombang')) {
        alert('Silakan pilih gelombang terlebih dahulu');
        return;
    }

    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Pengumuman</title>
                <style>
                    body { font-family: 'Times New Roman', serif; padding: 40px; }
                    .header-logo { text-align: center; margin-bottom: 20px; }
                    .header-logo h2 { margin: 0; color: #005F02; }
                    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                    table th, table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    table th { background: #f5f5f5; }
                    .footer { margin-top: 30px; text-align: right; }
                    @media print {
                        body { margin: 0; padding: 20px; }
                    }
                </style>
            </head>
            <body>
                ${previewContent}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

function printSpecificAnnouncement(announcement) {
    viewAnnouncementDetail(announcement);
    setTimeout(() => {
        printModalContent();
    }, 500);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\pendaftaran\waves\announcement\index.blade.php ENDPATH**/ ?>