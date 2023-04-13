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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  <h1>Halaman Pekerjaan</h1>
</div>

<div class="w3-container">
  <br>
  <?php
  if (!isset($_GET['id_pekerjaan'])) {
    header('location: index.php');
  }
    include 'koneksi.php';
    $id_pekerjaan = $koneksi->real_escape_string($_GET['id_pekerjaan']);
    $a = $koneksi -> query("SELECT * FROM pekerjaan WHERE id_pekerjaan = '$id_pekerjaan'");
    if ($a->num_rows == 0) {
      ?>
      <script>
        alert('Tidak ditemukan');
        window.location = 'index.php';
      </script>
      <?php
    }
    $d = $a -> fetch_assoc();
  ?>
  <form action="" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama lengkap</label>
      <input type="text" name="nama" placeholder="Nama lengkap" class="form-control" required id="nama" value="<?= $d['nama'] ?>">
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">Pekerjaan</label>
      <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-control" required id="jb"  value="<?= $d['pekerjaan'] ?>">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= $d['alamat'] ?></textarea>
    </div>
    
    <label for="a" class="form-label">Gaji perbulan</label>
    <select class="form-select" aria-label="Default select example" id="a" name="gaji">
      <option value="< 3.000.000" <?= ($d['gaji'] == "< 3.000.000") ? "selected" : "" ?>>< 3.000.000</option>
      <option value="3.000.000 - 5.000.000" <?= ($d['gaji'] == "3.000.000 - 5.000.000") ? "selected" : "" ?>>3.000.000 - 5.000.000</option>
      <option value="6.000.000 - 10.000.000" <?= ($d['gaji'] == "6.000.000 - 10.000.000") ? "selected" : "" ?>>6.000.000 - 10.000.000</option>
      <option value="> 10.000.000"> <?= ($d['gaji'] == "> 10.000.000") ? "selected" : "" ?>> 10.000.000</option>
    </select>
    <hr>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn" style="background: #45ADA8; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button>
    </div>
  </form>
  </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $pekerjaan = $_POST['pekerjaan'];
  $alamat = $_POST['alamat'];
  $gaji = $_POST['gaji'];

  $a = $koneksi ->query("UPDATE `pekerjaan` SET `nama`='$nama',`pekerjaan`='$pekerjaan',`alamat`='$alamat',`gaji`='$gaji' WHERE `id_pekerjaan` = '$id_pekerjaan'");
  if ($a) {
    ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil menyimpan',
        showConfirmButton: false,
        timer: 1000
      }).then(() => {
        window.location = 'halaman-pekerjaan.php';
      })
    </script>
    <?php
  }
}