<?php
session_start();
include('koneksi.php');

$kode = $_POST['kode'];
$sayur = $_POST['sayur'];
$air = $_POST['air'];
$protein = $_POST['protein'];
$lemak = $_POST['lemak'];

$query = "INSERT INTO tb_gizi (kode, sayur, air, protein, lemak) VALUES ('$kode', '$sayur', '$air', '$protein', '$lemak')";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    $_SESSION['success'] = "Data berhasil ditambahkan.";
    header('Location: index.php');
}
