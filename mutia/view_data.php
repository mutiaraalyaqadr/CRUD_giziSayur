<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
#style {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#style td, #style th {
  border: 1px solid #ddd;
  padding: 8px;
}

#style tr:nth-child(even){background-color: #f2f2f2;}

#style tr:hover {background-color: #ddd;}

#style th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h2>DATA SISWA</h2>
<?php
include "koneksi.php";
$data = mysqli_query($link,"select * FROM tb_data where nilai>=60 order by nilai, nama desc");
?>

<table id="style">
<tr>
    <th width="20">No.</th>
    <th>NISN</th>
    <th>NAMA <br>SISWA</th>
    <th width="30">KELAS</th>
    <th>NILAI</th>
    <th>JUARA</th>
    <th>AKSI</th>
</tr>
<?php
$no=1;
while($dt = mysqli_fetch_array($data)) {
$nisn=$dt['nisn'];
$nisn=$dt['nama'];
$nisn=$dt['kelas'];
$nisn=$dt['nilai'];
$nisn=$dt['juara'];
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$nisn;?></td>
    <td><?=$nama;?></td>
    <td><?=$kelas;?></td>
    <td><?=$juara;?></td>
</tr>
<?
}
?>
</table>

</body>
</html>


