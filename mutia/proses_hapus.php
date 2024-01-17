<?php
session_start();
include('koneksi.php');
$no = $_GET['no'];
$query = "DELETE FROM tb_gizi where `no` = '$no'";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    $_SESSION['success'] = "Data berhasil dihapus.";
    header('Location: index.php');
}
