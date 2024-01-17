<?php

require 'fpdf186/fpdf.php';

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetTitle('Data Gizi Sayur');
$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 16);
$pdf->SetTextColor(128, 0, 128);
$pdf->Cell(0, 10, 'DATA GIZI DALAM SAYURAN', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('helvetica', 'B', 12);

$pdf->SetFillColor(221, 160, 221); 
$pdf->SetTextColor(0, 0, 0);

$pdf->Cell(10, 7, 'No', 1, 0, 'C', true); 
$pdf->Cell(40, 7, 'Kode Gizi', 1, 0, 'C', true);
$pdf->Cell(50, 7, 'Macam Sayuran', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'Air(%)', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'Protein(%)', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'Lemak(%)', 1, 1, 'C', true);

$pdf->SetFont('helvetica', '', 12);

include 'koneksi.php';

$query = "SELECT * FROM tb_gizi ORDER BY `no` ASC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}

$no = 1;

while ($row = mysqli_fetch_assoc($result)) {

    $pdf->SetTextColor(0, 0, 0);

    $fillColor = ($no % 2 == 0) ? array(249, 231, 255) : array(248, 248, 248);

    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);

    $pdf->Cell(10, 7, $no, 1, 0, 'C', true);
    $pdf->Cell(40, 7, $row['kode'], 1, 0, 'C', true);
    $pdf->Cell(50, 7, $row['sayur'], 1, 0, 'C', true);
    $pdf->Cell(30, 7, $row['air'], 1, 0, 'C', true);
    $pdf->Cell(30, 7, $row['protein'], 1, 0, 'C', true);
    $pdf->Cell(30, 7, $row['lemak'], 1, 1, 'C', true);

    $no++;
}

$pdf->Output('', 'Data Gizi Sayur.pdf');
