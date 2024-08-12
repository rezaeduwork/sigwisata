<?php
session_start();
include '../koneksi.php';

// Periksa jika pengguna telah login
if (!isset($_SESSION['id_user'])) {
    echo "You need to log in to submit a comment.";
    exit;
}

$id_user = $_SESSION['id_user'];
$id_wisata = $_POST['id_wisata'];
$komentar = $_POST['komentar'];
$rating = $_POST['rating'];

// Debug output
var_dump($_SESSION);
var_dump($_POST);

$sql = "INSERT INTO komentar (id_user, id_wisata, komentar, rating) VALUES ('$id_user', '$id_wisata', '$komentar', '$rating')";
if (mysqli_query($koneksi, $sql)) {
    header("Location: detail.php?id_wisata=$id_wisata");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
