<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<div class="card shadow mb-4">
<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah pasien</h6>
    </div>
    <div class="card-body">
    <form method="post" action="<?= base_url('pasien/tambah'); ?>">
        <!-- <label for="no_antrian">No Antrian:</label>
        <input class="form-control" type="text" name="no_antrian" required><br> -->

        <label for="nama">Nama:</label>
        <input class="form-control" type="text" name="nama" required><br>

        <label for="nik">NIK:</label>
        <input class="form-control" type="text" name="nik" required><br>

        <!-- <label for="usia">Usia:</label>
        <input class="form-control" type="number" name="usia" required><br> -->

        <label for="no_telp">No. Telp:</label>
        <input class="form-control" type="text" name="no_telp" required><br>

        <label for="penjamin">Penjamin:</label>
        <select class="form-control" name="penjamin" id="penjamin">
            <option value="BPJS"></option>
            <option value="BPJS">BPJS</option>
            <option value="Mandiri">Mandiri</option>
        </select>

        <br>

        <div class="form-group" id="no_bpjs_group">
            <label for="no_bpjs">Nomor BPJS:</label>
            <input class="form-control" type="text" name="no_bpjs" required><br>
        </div>

        <label for="keluhan">Keluhan:</label>
        <textarea class="form-control" name="keluhan" required></textarea><br>

        <!-- <label for="status">Status:</label> -->
        <!-- <select name="status">
            <option value="dalam antrian">Dalam Antrian</option>
            <option value="selesai">Selesai</option>
            <option value="lainnya">Lainnya</option>
        </select><br> -->


        <button type="submit" class="m-0 font-weight-bold btn btn-success">Simpan</button>
        </form>
</div>
</div>
</div>

<script>
    // Ambil elemen-elemen yang diperlukan
    const penjaminSelect = document.getElementById("penjamin");
    const noBpjsGroup = document.getElementById("no_bpjs_group");

    // Sembunyikan elemen "No. BPJS" saat halaman pertama kali dimuat
    noBpjsGroup.style.display = "none";

    // Tambahkan event listener untuk mengelola visibilitas
    penjaminSelect.addEventListener("change", function() {
        if (penjaminSelect.value === "BPJS") {
            noBpjsGroup.style.display = "block";
        } else {
            noBpjsGroup.style.display = "none";
        }
    });
</script>
