<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="api.ico">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <h1 class="h3 mb-3 font-weight-normal">Register</h1>
      <label for="name" class="sr-only">Name</label>
      <input type="text" id="name" class="form-control" placeholder="Name" required autofocus name= "name">
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Register</button>
      <a href="login.php" style="float: left;">Login</a>
    </form>
  </body>
</html>
<?php

if (isset($_POST['submit'])) {
  include 'koneksi.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  try {
    $q = $koneksi->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    ?>
    <script>
      alert("Berhasil register");
      window.location = "login.php";
    </script>
    <?php
  } catch (Exception $e) {
    ?>
    <script>
      alert("Email sudah digunakan");
    </script>
    <?php
    return;
  }
}