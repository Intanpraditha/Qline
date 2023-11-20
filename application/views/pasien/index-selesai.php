<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
        .tblmodal th, td{
            padding: 15px;
        }

        @media print {
        #printButton, .close {
            display: none;
        }
        }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-Dark">Selesai</h4>
    </div>
    <div class="card-body">
        <!-- <div class="card-header py-3"> -->
            <!-- <a href="<?= base_url('pasien/tambah') ?>" class="m-0 font-weight-bold btn btn-primary" >Tambah pasien</a> -->
            <!-- <button id="myBtn">Unduh kartu antrian</button> -->
        <!-- </div> -->
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
        <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <center>
            <span class="close">&times;</span>
            <h3>laporan pasien</h3>
            <hr>
            </center>
            <table border='1' class="tblmodal">
                <tr>
                    <th>No Antrian</th>
                    <th>Waktu Daftar</th>
                    <th>Penjamin</th>
                    <th>No BPJS</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>No. Telp</th>
                    <th>Keluhan</th>
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
                    </tr>
                <?php } ?>  
            </table>
            <button id="printButton">Unduh</button>
        </div>
    </div>
    </div>
</div>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script type="text/javascript">

        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
        // Ganti bagian yang menangani klik tombol cetak dengan kode ini

        // Ganti bagian yang menangani klik tombol cetak dengan kode ini

        // Tangani klik tombol cetak
        printButton.onclick = function() {
            var modalContent = document.querySelector(".modal-content");
            var printBtn = document.getElementById("printButton");

            // Sembunyikan tombol cetak sementara
            printBtn.style.display = "none";

            // Mengonversi elemen modal menjadi file PDF
            html2pdf(modalContent, {
                margin: 10,
                filename: 'laporan-pasien.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            }).then(() => {
                // Tampilkan kembali tombol cetak setelah selesai
                printBtn.style.display = "block";
            });
        };



</script>

</body>
</html>
