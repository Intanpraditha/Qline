<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<div class="card shadow mb-4">
<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit pasien</h6>
    </div>
    <div class="card-body">
    <form method="post" action="<?= base_url('pasien/edit/' . $pasien->id_pasien); ?>">
        <label for="no_antrian">No Antrian:</label>
        <input class="form-control" type="text" name="no_antrian" value="<?= $pasien->no_antrian; ?>" required><br>

        <label for="penjamin">Penjamin:</label>
        <select class="form-control" name="penjamin">
            <option value="BPJS" <?= ($pasien->penjamin == 'BPJS') ? 'selected' : ''; ?>>BPJS</option>
            <option value="Mandiri" <?= ($pasien->penjamin == 'Mandiri') ? 'selected' : ''; ?>>Mandiri</option>
        </select>
        <br>

        <label for="nama">Nomor BPJS:</label>
        <input class="form-control" type="text" name="nama" value="<?= $pasien->no_bpjs; ?>" required><br>
        
        <label for="nik">NIK:</label>
        <input class="form-control" type="text" name="nik" value="<?= $pasien->nik; ?>" required><br>

        <!-- <label for="usia">Usia:</label>
        <input class="form-control" type="number" name="usia" value="<?= $pasien->usia; ?>" required><br> -->

        <label for="no_telp">No. Telp:</label>
        <input class="form-control" type="text" name="no_telp" value="<?= $pasien->no_telp; ?>" required><br>

        <!-- <label for="jk">Jenis Kelamin:</label> -->
        <!-- <input class="form-control" type="radio" name="jk" value="Laki-laki" <?= ($pasien->jk == 'Laki-laki') ? 'checked' : ''; ?> required> Laki-laki
        <input class="form-control" type="radio" name="jk" value="Perempuan" <?= ($pasien->jk == 'Perempuan') ? 'checked' : ''; ?> required> Perempuan<br> -->
    
        <label for="keluhan">Keluhan:</label>
        <textarea class="form-control" name="keluhan" required><?= $pasien->keluhan; ?></textarea><br>

        <label for="status">Status:</label>
        <select class="form-control" name="status">
            <option value="belum datang" <?= ($pasien->status == 'belum datang') ? 'selected' : ''; ?>>belum datang</option>
            <option value="dalam antrian" <?= ($pasien->status == 'dalam antrian') ? 'selected' : ''; ?>>Dalam Antrian</option>
            <option value="selesai" <?= ($pasien->status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
        </select><br>


        <button type="submit" class="m-0 font-weight-bold btn btn-success">Simpan</button>
        </form>
</div>
</div>
</div>
