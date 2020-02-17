<?php
// import koneksi
include "db/koneksi.php";

// mengambil URL id untuk dihapus
$id = $_GET['id'];

// Hapus user sesuai baris id yang di pilih
$result = mysqli_query($conn, "DELETE FROM tbl_mahasiswa WHERE id = '$id' ");

// menampilkan pesan berhasil
echo "<script>alert('Data Mahasiswa Berhasil di Hapus.')</script>";
echo "<script>window.location = 'index.php';</script>";
