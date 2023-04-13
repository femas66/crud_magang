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
  <h1>Halaman warga</h1>
</div>

<div class="w3-container">
  <br>
  <a href="tambah-data.php" class="tambah">Tambah</a>
  <hr>
  <table class="tabel">
    <tr class="judulatas">
      <th>#</th>
      <th style="width: 140px;">Foto</th>
      <th>Nama Warga</th>
      <th style="width: 130px;">Jenis kelamin</th>
      <th>Status nikah</th>
      <th>Tanggal lahir</th>
      <th colspan="2" style="width: 140px;">Aksi</th>
    </tr>
    <?php
    $a = $koneksi -> query("SELECT * FROM warga");
    if ($a -> num_rows > 0) {
      $i = 1;
      while ($isi = $a -> fetch_array()) {
        ?>
        <tr>
          <td class="nomor"><?= $i++ ?></td>
          <td><img src="gambar/<?= $isi['foto'] ?>" width="100" height="100" class="foto"></td>
          <td><?= $isi['nama'] ?></td>
          <td><?= ($isi['jenis_kelamin'] == 'L') ? 'Laki laki' : 'Perempuan' ?></td>
          <td><?= ($isi['nikah'] == 'Y') ? "Sudah nikah" : "Belum nikah" ?></td>
          <td><?= date('d/m/Y',strtotime($isi['tanggal_lahir'])) ?></td>
          <td><a href="edit.php?id=<?= $isi['id'] ?>" class="edit"><i class="fa-solid fa-pen-to-square" style="color: black;"></i> Edit</a></td>
          <td><a href='?hapus_warga=<?= $isi['id'] ?>' class="hapus"><i class="fa-solid fa-trash" style="color: red;"></i> Hapus</a></td>
        </tr>
        <?php
      }
    } else {
      echo "
      <tr>
        <td colspan='7'><center>Tidak ada data</center></td>
      ";
    }
    ?>
    
  </table>
  <br>
</div>

</div>
      
</body>
</html>
<?php
if (isset($_GET['hapus_warga'])) {
  ?>
  <script>
    Swal.fire({
      title: 'Yakin mau hapus?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "hapus-data.php?hapus_warga=<?= $_GET['hapus_warga'] ?>";
      }
    })
  </script>
  <?php  
}