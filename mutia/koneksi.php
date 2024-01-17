<?php
$server = "localhost";
$username = "prokommy_mutia";
$password = "Mutiaracantik993_";
$dbname = "prokommy_mutia";
$koneksi = mysqli_connect($server, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "koneksi gagal";
  die();
} else {
  //echo "koneksi berhasil";
}
