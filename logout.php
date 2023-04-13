<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <?php
    session_start();
    unset($_SESSION['id']);
    session_destroy();
    ?>
    <script>
      Swal.fire(
        'Berhasil logout!',
        'Berhasil logout',
        'success'
      ).then(function() {
        window.location = "login.php";
      })
      
    </script>
  </body>
</html>


