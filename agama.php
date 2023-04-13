<?php
  include 'koneksi.php';
  session_start();
if (!isset($_SESSION['id'])) {
  header("location: login.php");
}
$q_user = $koneksi->query("SELECT * FROM users WHERE id_user = '$_SESSION[id]'");
$user = $q_user->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
    *{
      font-family: "Poppins", sans-serif;
    }
    .tombol {
      border-radius: 25px;
    }
    .tabel {
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      border-radius: 25px;
      width: 100%;
      text-align: center;
    }
    .tabel .judulatas {
      background: #45ADA8;
    }
    table th {
      padding: 8px;
      color: white;
    }
    .tabel td {
      padding-left: 10px;
      padding-right: 10px;
      padding-top: 8px;
      padding-bottom: 8px;
    }
    .tabel .foto {
      border-radius: 100px;
      border: 5px solid white;
    }
    .tabel .nomor {
      font-weight: bold;
    }
    .tabel {
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
    }
    .tabel .edit {
      color: black;
    }
    .tabel .hapus {
      color: red;
    }
    .tabel tr {
      background-color: #e8e3ff;
    }
    .tabel tr:nth-child(even) {
      background-color: #f0edff;
    }
    .tambah {
      background-color: #45ADA8;
      font-weight: bold;
      color: white;
      padding: 6px 15px;
      border-radius: 18px;
      text-decoration: none;
      margin-bottom: 10%;
    }
    
  </style>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="api.ico">
  <title>Crud</title>
  <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="api.ico">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block" style="width:15%; background-color: #45ADA8; font-weight: bold; color: white;">
  <h3 class="w3-bar-item">CRUD</h3>
  <a href="index.php" class="w3-bar-item w3-button">Data Warga</a>
  <a href="halaman-pekerjaan.php" class="w3-bar-item w3-button">Data pekerjaan</a>
  <a href="halaman-hobi.php" class="w3-bar-item w3-button">Data hobi</a>
  <a href="halaman-vaksin.php" class="w3-bar-item w3-button">Data vaksin</a>
  <a href="halaman-agama.php" class="w3-bar-item w3-button">Data agama</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>

<!-- Page Content -->
<div style="margin-left:15%">

<div class="w3-container" style="background: #45ADA8; color: white">
  <h1>Tambah Agama</h1>
</div>

<div class="w3-container">
  <br>
  <form action="" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama lengkap</label>
      <input type="text" name="nama" placeholder="Nama lengkap" class="form-control" required id="nama">
    </div>
    <hr>
    <div class="form-check">
      <label for="l">Laki laki</label>
      <input type="radio" name="jk" id="l" value="L" class="form-check-input">
    </div>
    <div class="form-check">
      <label for="p">Perempuan</label>
      <input type="radio" name="jk" id="p" value="P" class="form-check-input">
    </div>
    <label for="a" class="form-label">Agama sekarang</label>
    <select class="form-select" aria-label="Default select example" id="a" name="agama">
      <option selected value="Islam">Islam</option>
      <option value="Kristen">Kristen</option>
      <option value="Hindu">Hindu</option>
      <option value="Budha">Budha</option>
      <option value="Konghucu">Konghucu</option>
    </select>
    <label for="a" class="form-label">Agama sebelumnya</label>
    <select class="form-select" aria-label="Default select example" id="a" name="agama sebelumnya">
      <option selected value="Islam">Islam</option>
      <option value="Kristen">Kristen</option>
      <option value="Hindu">Hindu</option>
      <option value="Budha">Budha</option>
      <option value="Konghucu">Konghucu</option>
    </select>
    
    <hr>
    <div class="mb-3">
    <button type="submit" name="submit" class="btn" style="background: #45ADA8; font-weight: bold; color:white; border-radius: 18px;">Tambah</button>
    </div>
  </form>
  </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
$nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $agama = $_POST['agama'];
  $agama_sebelumnya = $_POST['agama_sebelumnya'];
  include 'koneksi.php';
  $a = $koneksi->query("INSERT INTO agama (nama, jenis_kelamin, agama, agama_sebelumnya) VALUES ('$nama', '$jk', '$agama', '$agama_sebelumnya')");
  ?>
  <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menambah data',
        showConfirmButton: false,
        timer: 1000
      }).then(function () {
        window.location = "halaman-agama.php";
      })
    </script>
  <?php
}