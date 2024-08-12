<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id_wisata'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];



// jika tidak ada gambar yang dikirim, update data tanpa memperbarui gambar
mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id='$id'");

// mengalihkan halaman kembali ke tampil_data.php
header("location:tampil_admin.php");
