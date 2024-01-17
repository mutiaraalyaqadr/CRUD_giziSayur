<?php
session_start();
include('koneksi.php');

$no = $_POST['no'];
$kode = $_POST['kode'];
$sayur = $_POST['sayur'];
$air = $_POST['air'];
$protein = $_POST['protein'];
$lemak = $_POST['lemak'];

$query = "UPDATE tb_gizi SET kode = '$kode', sayur = '$sayur', air = '$air', protein = '$protein', lemak = '$lemak'";
$query .= "WHERE no = '$no'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    $_SESSION['success'] = "Data berhasil diubah.";
    header('Location: index.php');
}
