<?php

require_once 'koneksi.php';

$kode = $_GET['kode'];

if (isset($_GET['no'])) {
  $no = $_GET['no'];
  $sql = "SELECT * FROM tb_gizi WHERE kode = '$kode' AND no != '$no'";
  $result = mysqli_query($koneksi, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "1";
  } else {
    echo "0";
  }
  die();
}

$sql = "SELECT * FROM tb_gizi WHERE kode = '$kode'";

$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "1";
} else {
  echo "0";
}
