<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Masukkan data ke dalam database
mysqli_query($koneksi, "INSERT INTO admin (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')");

// Alihkan kembali ke tampil_admin.php
header("location:tampil_admin.php");
?>
