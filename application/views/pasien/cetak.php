<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terimakasih</title>
    <style>
      * {
      box-sizing: border-box;
      }
      html, body {
      min-height: 100vh;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px; 
      color: #666;
      }
      input, textarea { 
      outline: none;
      }
      body {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: #f9e2f0;
      }
      h1,  {
      margin-top: 0;
      font-weight: 500;
      }
      form {
      position: relative;
      width: 80%;
      border-radius: 30px;
      background: #fff;
      /* box-shadow: 0px 0px 10px gray; */
      }
      .form-inner {
      padding: 40px;
      }
      .form-inner input,
      .form-inner select,
      .form-inner textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d0dfe8;
      }
      .form-inner textarea {
      resize: none;
      }
      #myBtn {
      width: 100%;
      padding: 15px 25px 15px 25px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      background: #f754b8; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      cursor:pointer;
    }
    
    #myBtn:hover{
          background: #E20B90; 
      }

      td{
        padding: 10px;
      }
      .batal{
        color:red;
        align-items:center;
        text-decoration:none;
      }
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      }
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
        .aksi{
            margin: 30px;
        }
        @media print {
        #printButton, .close {
            display: none;
        }
        }
    </style>
</head>
<body>
    <form action="">
        <div class="form-inner">
            <h1>TERIMAKASIH </h1>
            <h3>data anda akan segera kami proses</h3>
            <table>
                <tr>
                    <td>Waktu daftar </td>
                    <td>: <?= $pasien->waktu_daftar; ?></td>
                </tr>
                <tr>
                    
                        <td><b>Nomor Antrian </b></td>
                        <td><b>: <?= $pasien->no_antrian; ?></b></td>
                    
                    
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $pasien->nama; ?></td>
                </tr>
                <tr>
                    <td>Nomor KTP/NIK</td>
                    <td>: <?= $pasien->nik; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>: <?= $pasien->no_telp; ?></td>
                </tr>
                <tr>
                    <td>Penjamin</td>
                    <td>: <?= $pasien->penjamin; ?></td>
                </tr>
                <tr>
                    <td>Nomor BPJS</td>
                    <td>: <?= $pasien->no_bpjs; ?></td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>: <?= $pasien->keluhan; ?></td>
                </tr>
            </table>
            <div class="aksi">
                <a id="myBtn">Unduh kartu antrian</a><br><br>
                <a href="<?= base_url('home/hapus/' . $pasien->id_pasien) ?>" class="batal" onclick="return confirm('Apakah Anda yakin ingin membatalkan?')">batalkan pendaftaran?</a>
            </div>
        </div>
    </form>

    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <center>
                <h3>Praktek Mandiri Bidan Yeni Mariana, A.Md. Keb.</h3>
                <p>Jl. Urip Sumoharjo No.78 Kec. Tanggul, Kabupaten Jember, Jawa Timur</p>
                <hr>
                <p>nomor antrian</p>
                <h1 style="font-size:60px;"><?= $pasien->no_antrian; ?></h1>
                
                <p>nama pendaftar : <?= $pasien->nama; ?></p>
                <p>waktu daftar : <?= $pasien->waktu_daftar; ?></p>
                <hr>
                <h3>TERIMA KASIH</h3>
                <button id="printButton">Unduh</button>
            </center>
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
                filename: 'kartu-antrian.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
            }).then(() => {
                // Tampilkan kembali tombol cetak setelah selesai
                printBtn.style.display = "block";
            });
        };



</script>


</body>
</html>