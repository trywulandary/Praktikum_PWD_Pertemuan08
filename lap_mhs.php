<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
// buat cell pertama
// 190 => Ukuran lebar (px)
$pdf->Cell(190, 7, 'PROGRAM STUDI TEKNIK INFORMATIKA', 0, 1, 'C');
// Set font yang akan digunakan seperti jenis, weight, ukuran
$pdf->SetFont('Arial', 'B', 12);
// tambah cell kedua seperti dibawah ini
$pdf->Cell(190, 7, 'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
// buat cell ketiga sebagai enter
$pdf->Cell(10, 7, '', 0, 1);
// set font
$pdf->SetFont('Arial', 'B', 10);
// buat cell untuk tabel column nya sesuai data yang akan ditampilkan apa saja
$pdf->Cell(20, 6, 'NIM', 1, 0);
$pdf->Cell(50, 6, 'NAMA MAHASISWA', 1, 0);
$pdf->Cell(25, 6, 'J KEL', 1, 0);
$pdf->Cell(50, 6, 'ALAMAT', 1, 0);
$pdf->Cell(30, 6, 'TANGGAL LHR', 1, 1);
// set font
$pdf->SetFont('Arial', '', 10);
// panggil koneksi.php untuk memproses data
include '../praktikum_pwd3/koneksi.php';
// ambil seluruh data yang akan ditampilkan
$mahasiswa = mysqli_query($con, "select * from mahasiswa");
// cetak data menggunakan while dan ambil menggunakan mysqli_fetch_array untuk menjadikan data menjadi array
while ($row = mysqli_fetch_array($mahasiswa)) {
    // cetak semua data menggunakan cell dan row agar data dapat terisi berdasarkan baris pada cell
    $pdf->Cell(20, 6, $row['nim'], 1, 0);
    $pdf->Cell(50, 6, $row['nama'], 1, 0);
    $pdf->Cell(25, 6, $row['jkel'], 1, 0);
    $pdf->Cell(50, 6, $row['alamat'], 1, 0);
    $pdf->Cell(30, 6, $row['tgllhr'], 1, 1);
}
// ambil data pdf menggunakan fungsi output pada php
$pdf->Output();