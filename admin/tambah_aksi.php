<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga_tiket = $_POST['harga_tiket'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$jenis = $_POST['jenis'];
$uploadDirectory = "uploads/";
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$path = $uploadDirectory . $gambar;

move_uploaded_file($tmp, $path);

// Masukkan data ke dalam database
mysqli_query($koneksi, "INSERT INTO wisata VALUES (null,'$nama','$alamat','$deskripsi','$harga_tiket','$latitude','$longitude','$gambar','$jenis')");

// Alihkan kembali ke index.php
header("location:tampil_data.php");
?>
