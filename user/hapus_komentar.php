<?php
session_start();
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_komentar = $_GET['id'];
    $query = "DELETE FROM komentar WHERE id_komentar = '$id_komentar' AND id_user = '".$_SESSION['id_user']."'";
    mysqli_query($koneksi, $query);

    $_SESSION['message'] = 'Anda berhasil mengehapus komentar.';
    header("Location: data_wisata.php");
}
?>
