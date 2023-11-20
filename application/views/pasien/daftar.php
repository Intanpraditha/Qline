<!DOCTYPE html>
<html>
  <head>
    <title>Daftar antrian</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
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
      h1 {
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
      .form-inner option,
      .form-inner textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d6d3f0;
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
      cursor: pointer;
      }
      button:hover {
      background: #cc4698;
      } 
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      }
    </style>
    
  </head>
  <body>
    <form method="post" action="<?= base_url('home/daftar'); ?>">
      <div class="form-inner">
        <h1>Daftar Antrian</h1>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="number" name="nik" placeholder="Nomor KTP" required>
        <span id="nikWarning" style="color: red; display: none;"></span>
        <input type="number" name="no_telp" placeholder="Nomor telepon/WA aktif" required>
        <span id="noTelpWarning" style="color: red; display: none;"></span>
        <select name="penjamin" id="penjamin">
          <option value="Mandiri">Penjamin</option>
          <option value="BPJS">BPJS</option>
          <option value="Mandiri">Mandiri</option>
        </select>
        <input type="number" name="no_bpjs" placeholder="Nomor BPJS" id="no_bpjs_group">
        <!-- <span id="noBpjsWarning" style="color: red; display: none;"></span> -->
        <textarea name="keluhan" placeholder="Keluhan" rows="5"></textarea>
        <button id="simpanButton" type="submit" class="btn btn-primary">Daftar</button>
      </div>
    </form>
  
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

      document.getElementById('simpanButton').addEventListener('click', function(event) {
      var nikInput = document.getElementsByName('nik')[0];
      var noTelpInput = document.getElementsByName('no_telp')[0];
      // var noBpjsInput = document.getElementsByName('no_bpjs')[0];
      // var penjaminSelect = document.getElementById('penjamin');

      if (nikInput.value.length < 16) {
        document.getElementById('nikWarning').textContent = 'Nomor KTP harus memiliki setidaknya 16 karakter.';
        document.getElementById('nikWarning').style.display = 'block';
        event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
      } else {
        document.getElementById('nikWarning').style.display = 'none';
      }

      if (noTelpInput.value.length < 10) {
        document.getElementById('noTelpWarning').textContent = 'Nomor telepon/WA aktif harus memiliki setidaknya 10 karakter.';
        document.getElementById('noTelpWarning').style.display = 'block';
        event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
      } else {
        document.getElementById('noTelpWarning').style.display = 'none';
      }

      // if (penjaminSelect.value === 'BPJS' && noBpjsInput.value.length < 10) {
      //   document.getElementById('noBpjsWarning').textContent = 'Nomor BPJS harus memiliki setidaknya 10 karakter.';
      //   document.getElementById('noBpjsWarning').style.display = 'block';
      //   event.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
      // } else {
      //   document.getElementById('noBpjsWarning').style.display = 'none';
      // }
    });

    </script>
  </body>
</html>