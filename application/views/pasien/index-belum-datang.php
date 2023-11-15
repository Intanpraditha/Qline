<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-dark">Belum Datang</h4>
    </div>
    <div class="card-body">
        <!-- <div class="card-header py-3">
            <a href="<?= base_url('pasien/tambah') ?>" class="m-0 font-weight-bold btn btn-primary" >Tambah pasien</a>
        </div> -->
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
        <tr>
        <th>No Antrian</th>
            <th>Waktu Daftar</th>
            <th>Penjamin</th>
            <th>No BPJS</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>No. Telp</th>
            <th>Keluhan</th>
            <th>Status</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php foreach ($pasien as $p) { ?>
            <tr>
            <td><?= $p->no_antrian; ?></td>
                <td><?= $p->waktu_daftar; ?></td>
                <td><?= $p->penjamin; ?></td>
                <td><?= $p->no_bpjs; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->nik; ?></td>
                <td><?= $p->no_telp; ?></td>
                <td><?= $p->keluhan; ?></td>
                <td><?= $p->status; ?></td>
                <td>
                    <a href="<?= base_url('pasien/edit/' . $p->id_pasien) ?>" class="m-0 font-weight-bold btn btn-info"><i class="fas fa-fw fa-pen"></i></a>
                </td>
                <td>
                    <a href="<?= base_url('pasien/hapus/' . $p->id_pasien) ?>" class="m-0 font-weight-bold btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash"></i></a>
                </td>
                <td>
                    <?php if ($p->status == 'belum datang') { ?>
                        <a href="<?= base_url('pasien/dalam_antrian/' . $p->id_pasien); ?>" class="m-0 font-weight-bold btn btn-secondary" onclick="return confirm('pasien datang?')">Hadir</a><br><br>
                        <a href="javascript:void(0);" class="m-0 font-weight-bold btn btn-success" onclick="sendWhatsApp(<?= $p->id_pasien; ?>)">WhatsApp</a>
                    <?php } elseif ($p->status == 'dalam antrian') { ?>
                        <!-- Tampilkan tombol atau tindakan lain sesuai dengan status "Dalam Antrian" -->
                        <!-- Contoh: -->
                        <a href="<?= base_url('pasien/selesai/' . $p->id_pasien); ?>" class="m-0 font-weight-bold btn btn-success" onclick="return confirm('Approve data ini?')">Selesai</i></a>
                    <?php } ?>
                </td>
                <!-- <td>
                    <?php if ($p->status == 'dalam antrian') { ?>
                        <a href="<?= base_url('pasien/selesai/' . $p->id_pasien); ?>">Selesai</a>
                    <?php } ?>
                </td> -->
            </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkForStatusChange() {
        // Buat permintaan AJAX untuk memeriksa perubahan status
        $.ajax({
            url: '<?= base_url('pasien/check_status_change'); ?>',
            type: 'GET',
            success: function(data) {
                if (data.status_changed) {
                    // Status berubah, lakukan reload halaman
                    location.reload();
                }
            }
        });
    }

    // Panggil fungsi checkForStatusChange secara berkala
    setInterval(checkForStatusChange, 5000); // Contoh: cek setiap 5 detik

    function sendWhatsApp(patientId) {
        // Assuming the sender's number is 085706298928
        var senderNumber = '6285706298928'; // Format without leading 0

        // Get the patient's phone number based on the ID
        var phoneNumber = '62' + <?= $p->no_telp; ?>; // Assuming the phone number is in Indonesian format

        // Construct the WhatsApp message
        var whatsappMessage = encodeURIComponent(
            'Halo, Anda memiliki janji pada ' + '<?= $p->waktu_daftar; ?>' +
            '. Jangan lupa datang ya! Terima kasih.'
        );

        // Create the WhatsApp link
        var whatsappLink = 'https://wa.me/' + phoneNumber + '?text=' + whatsappMessage + '&source=' + senderNumber;

        // Open WhatsApp in a new tab with the pre-filled message
        window.open(whatsappLink, '_blank');
    }
</script>

</body>
</html>
