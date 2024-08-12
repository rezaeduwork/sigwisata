<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);
    $_SESSION['id_user'] = $user['id_user']; // Menyimpan ID pengguna di sesi
    $_SESSION['status'] = "login";
    header("Location: index.php");
} else {
    header("Location: login.php?pesan=gagal");
}
?>
