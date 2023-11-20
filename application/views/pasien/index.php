<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">Dalam antrian</h4>
        </div>
    <div class="card-body">
        <div class="card-header py-3">
            <a href="<?= base_url('pasien/tambah') ?>" class="m-0 font-weight-bold btn btn-primary" >Tambah pasien</a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" id="tampilkan-tombol" class="btn btn-warning">Bersihkan</button>
                <button type="submit" name="hapus" class="btn btn-danger" id="tombol-hapus" style="display: none;" onclick="return confirm('yakin ingin menghapus data-data ini? data yang telah dihapus tidak bisa dikembalikan')">Hapus Terpilih</button>
                <button type="button" id="batalkan" class="btn btn-warning" style="display: none;">x</button>
            </div>
        </div>
        <form method="post" action="<?= base_url('pasien/hapus_banyak'); ?>">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Antrian</th>
                            <th>Waktu Daftar</th>
                            <th>Penjamin</th>
                            <th>No. BPJS</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No. Telp</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th colspan="4">Aksi</th>
                            <th></th>
                        </tr>
                    <?php foreach ($pasien as $p) { ?>
                        <tr>
                            <td id="nomor_antrian_<?= $p->id_pasien ?>"><?= $p->no_antrian; ?></td>
                            <td><?= $p->waktu_daftar; ?></td>
                            <td><?= $p->penjamin; ?></td>
                            <td><?= $p->no_bpjs; ?></td>
                            <td><?= $p->nama; ?></td>
                            <td><?= $p->nik; ?></td>
                            <td><?= $p->no_telp; ?></td>
                            <td><?= $p->keluhan; ?></td>
                            <td><?= $p->status; ?></td>
                            <td>
                                <button class="panggil-btn m-0 font-weight-bold btn btn-info" data-id="<?= $p->id_pasien ?>" title="panggil"><i class="fas fa-fw fa-bell"></i></button>
                            </td>
                            <td>
                                <a href="<?= base_url('pasien/edit/' . $p->id_pasien) ?>" class="m-0 font-weight-bold btn btn-warning" title="edit"><i class="fas fa-fw fa-pen"></i></a>
                            </td>
                            <td>
                                <a href="<?= base_url('pasien/hapus/' . $p->id_pasien) ?>" class="m-0 font-weight-bold btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="hapus"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                            <td>
                                <?php if ($p->status == 'belum datang') { ?>
                                    <a href="<?= base_url('pasien/dalam_antrian/' . $p->id_pasien); ?>" class="m-0 font-weight-bold btn btn-secondary" onclick="return confirm('pasien datang?')">Hadir</a>
                                <?php } elseif ($p->status == 'dalam antrian') { ?>
                                    <!-- Tampilkan tombol atau tindakan lain sesuai dengan status "Dalam Antrian" -->
                                    <!-- Contoh: -->
                                    <a href="<?= base_url('pasien/selesai/' . $p->id_pasien); ?>" class="m-0 font-weight-bold btn btn-success" onclick="return confirm('Approve data ini?')">Selesai</i></a>
                                <?php } ?>
                            </td>
                        
                            <td><input type="checkbox" name="pilih[]" value="<?= $p->id_pasien; ?>" style="display: none;"></td>
                            <!-- Tampilkan data lainnya -->
            
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </form>    
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


<script>
    document.querySelectorAll(".panggil-btn").forEach(button => {
        button.addEventListener("click", () => {
            const idPasien = button.getAttribute("data-id");
            const nomorAntrianElement = document.getElementById(`nomor_antrian_${idPasien}`);

            if (nomorAntrianElement) {
                const nomor_antrian = nomorAntrianElement.textContent;
                const msg = "Antrian nomor. " + nomor_antrian;
                const utterance = new SpeechSynthesisUtterance(msg);
                utterance.lang = "id-ID"; // ID adalah kode bahasa untuk Bahasa Indonesia
                utterance.pitch = 1;
                utterance.rate = 0.8;
                utterance.volume = 1;
                speechSynthesis.speak(utterance);
            }
        });
    });
</script>

<script>
    document.getElementById("tampilkan-tombol").addEventListener("click", function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var tombolHapus = document.getElementById("tombol-hapus");
        var tombolBatalkan = document.getElementById("batalkan");

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].style.display = "block";
        }

        tombolHapus.style.display = "block";
        tombolBatalkan.style.display = "block";
        this.style.display = "none";
    });

    document.getElementById("batalkan").addEventListener("click", function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var tombolHapus = document.getElementById("tombol-hapus");
        var tombolMunculkan = document.getElementById("tampilkan-tombol");

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].style.display = "none";
        }

        tombolHapus.style.display = "none";
        tombolMunculkan.style.display = "block";
        this.style.display = "none";
    });

    
</script>








</body>
</html>
