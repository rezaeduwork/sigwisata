<?php
// Mengaktifkan session php
session_start();

// Menghubungkan dengan koneksi
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Memeriksa apakah password dan konfirmasi password cocok
if ($password == $confirm_password) {
    // Mengenkripsi password dengan MD5
    $password_md5 = md5($password);

    // Menyimpan data ke database
    $query = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password_md5')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        header("location:register.php?pesan=gagal");
    }
} else {
    header("location:register.php?pesan=password_tidak_sama");
}
?>
