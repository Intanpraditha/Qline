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
      /* .form-left-decoration,
      .form-right-decoration {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 20px;
      background: #88B44E;
      }
      .form-left-decoration {
      bottom: 60px;
      left: -30px;
      }
      .form-right-decoration {
      top: 60px;
      right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration:before {
      top: -20px;
      }
      .form-left-decoration:after {
      top: 20px;
      left: 10px;
      }
      .form-right-decoration:before {
      top: -20px;
      right: 0;
      }
      .form-right-decoration:after {
      top: 20px;
      right: 10px;
      }
      .circle {
      position: absolute;
      bottom: 80px;
      left: -55px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      } */
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
      button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      /* border-bottom: 4px solid #3e4f24; */
      background: #f754b8; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      button:hover {
      background: #3e4f24;
      } 
      td{
        padding: 10px;
      }
      a{
        color:red;
        align-items:center;
        padding-top:50x;
        text-decoration:none;
      }
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      }
      .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
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
            <button type='button' id="showModal">Selesai</button>
            <br><br>
            <a href="<?= base_url('home/hapus/' . $pasien->id_pasien) ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan?')">batalkan pendaftaran?</a>
        </div>
    </form>

    <div class="modal" id="myModal">
        <div class="modal-content">
            <!-- Display data here -->
            <center>
                <h3>Praktek Mandiri Bidan Yeni Mariana, A.Md. Keb.</h3>
                <hr>
                <h1><?= $pasien->no_antrian; ?></h1>
            </center>
            <button type="button" onclick="hideModal()">Close</button>
        </div>
    </div>

    <script type="text/javascript">
    function send() {
        // Get the phone number
        var phoneNumber = '62' + <?= $pasien->no_telp; ?>; // assuming the phone number is in Indonesian format

        // Get other details for the message
        var nomorAntrian = '<?= $pasien->no_antrian; ?>';
        var namaPasien = '<?= $pasien->nama; ?>';
        var keluhan = '<?= $pasien->keluhan; ?>';

        // Construct the WhatsApp message
        var whatsappMessage = encodeURIComponent(
            'Permisi, ' +
            'saya ingin mengonfirmasi bahwa ' +
            'Nomor Antrian *' + nomorAntrian + '* atas nama *' + namaPasien +
            '* dengan keluhan ' + keluhan + '. Apakah ada kendala sehingga tidak dapat datang?' +
            ' Terima kasih.'
        );

        // Create the WhatsApp link
        var whatsappLink = 'https://api.whatsapp.com/send?phone=' + phoneNumber + '&text=' + whatsappMessage;

        // Open WhatsApp in a new tab with the pre-filled message
        window.open(whatsappLink, '_blank');

         // Function to show the modal
        function showModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        // Function to hide the modal
        function hideModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        // Attach click event to the "Selesai" button
        document.getElementById('showModal').addEventListener('click', showModal);
</script>


</body>
</html>