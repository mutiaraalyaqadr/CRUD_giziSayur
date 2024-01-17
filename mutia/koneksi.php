<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "prokommy_mutia";

$koneksi = mysqli_connect($server, $username, $password, $dbname);

if (!$koneksi) {
  die("Database tidak dapat terhubung: " . mysqli_connect_error());
}
