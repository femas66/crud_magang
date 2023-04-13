<?php
$koneksi = new mysqli('localhost', 'root', '', 'day1');
if ($koneksi->connect_errno) {
  die('Koneksi error : ' . $koneksi->connect_error);
}
?>