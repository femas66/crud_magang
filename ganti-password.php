<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['id'])) {
  header("location: login.php");
}

$q_user = $koneksi->query("SELECT * FROM `users` WHERE `id_user` = '$_SESSION[id]'");
$user = $q_user->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="api.ico">
  <link href="signin.css" rel="stylesheet">
</head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <h1 class="h3 mb-3 font-weight-normal">Ganti password</h1>
      <label for="email" class="sr-only">Email</label>
      <input type="text" id="email" class="form-control" placeholder="Email" name="password_lama" value="<?= $user['email'] ?>" style="margin-bottom: 14px;" readonly>
      <label for="passwordlama" class="sr-only">Password lama</label>
      <input type="password" id="passwordlama" class="form-control" placeholder="Password lama" required autofocus name="password_lama">
      <label for="inputPassword" class="sr-only">Password baru</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password baru" required name="password">
      <hr>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Ganti</button>
    </form>
  </body>
</html>
<?php
if (isset($_POST['submit'])) {
  $password_lama = md5($_POST['password_lama']);
  $password_baru = md5($_POST['password']);
  $cek_password_lama = $koneksi->query("SELECT password FROM `users` WHERE `id_user` = '$_SESSION[id]'");
  $data_password_lama = $cek_password_lama->fetch_array();
  if ($data_password_lama['password'] == $password_lama) {
    $query_update = $koneksi->query("UPDATE `users` SET `password` = '$password_baru' WHERE `id_user` = '$_SESSION[id]'");
    ?>
    <script>
      alert("Berhasil merubah password");
      window.location = "index.php";
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Password salah");
    </script>
    <?php
    return;
  }
}
?>