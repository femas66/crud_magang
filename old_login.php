<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="api.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
      <a href="register.php" style="float: left;">Register</a>
      <a href="lupa-password.php" style="float: right;">Forgot password</a>
    </form>
  </body>
</html>

<?php

if (isset($_GET['e'])) {
  ?>
  <script>
    alert("Username / password salah");
  </script>
  <?php
}

if (isset($_POST['submit'])) {
  include 'koneksi.php';
  $email = $koneksi->real_escape_string($_POST['email']);
  $password = md5($koneksi->real_escape_string($_POST['password']));

  $q = $koneksi->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
  if ($q->num_rows > 0) {
    $data = $q->fetch_assoc();
    session_start();
    $_SESSION['id'] = $data['id_user'];
    header("location: index.php");
  }
  else {
    header("location: login.php?e=salah");
  }
}