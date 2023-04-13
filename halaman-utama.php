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
<html lang="en">
<head>
  <meta charset="UTF-8">
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
  <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
    *{
      font-family: "Poppins", sans-serif;
    }
    .tombol {
      border-radius: 25px;
    }
    body {
      background: #E5FCC2;
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
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(157,224,173);
background: linear-gradient(256deg, rgba(157,224,173,1) 0%, rgba(69,173,168,1) 37%, rgba(84,121,128,1) 100%);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"  style="color: white;">CRUD Data Warga</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="color: white;">Data Warga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="halaman-pekerjaan.php" style="color: white;">Pekerjaan Warga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="halaman-hobi.php" style="color: white;">Hobi Warga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="halaman-vaksin.php" style="color: white;">Data Vaksin Warga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="halaman-agama.php" style="color: white;">Agama Warga</a>
        </li>
        <li class="nav-item dropdown" >
          <a style="color: white;" class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= ucfirst($user['name']) ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!-- <li><a class="dropdown-item" href="#">Ganti Password</a></li> -->
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
    <br>
  <center>
    <h3 style="color: #594F4F;"><b>Agama warga</b></h3>
  </center>
  <br>
  <a href="" class="tambah"><i class="fa-solid fa-plus"></i>Tambah</a>
  <hr>
  <table class="tabel">
    <tr class="judulatas">
      <th>#</th>
      <th style="width: 150px;">Foto</th>
      <th>Nama Warga</th>
      <th>Jenis kelamin</th>
      <th>Status nikah</th>
      <th>Tanggal lahir</th>
      <th colspan="2" style="width: 150px;">Aksi</th>
    </tr>
    <tr>
      <td class="nomor">1</td>
      <td><img src="gambar/16812699767c088b7ace06fb42f798dee6195311d6.jpg" width="100" height="100" class="foto"></td>
      <td>Abdul</td>
      <td>Abdul</td>
      <td>Abdul</td>
      <td>19/02/2019</td>
      <td><a href="#" class="edit"><i class="fa-solid fa-pen-to-square" style="color: black;"></i> Edit</a></td>
      <td><a href="#" class="hapus"><i class="fa-solid fa-pen-to-square" style="color: red;"></i> Hapus</a></td>
    </tr>
  </table>
  <br>
  </div>
</body>
</html>