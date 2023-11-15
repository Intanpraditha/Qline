<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-Dark">Selesai</h4>
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
            <th colspan="2">Aksi</th>
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
</script>

</body>
</html>
