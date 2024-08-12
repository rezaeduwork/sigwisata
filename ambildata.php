<?php
include "koneksi.php";
$query = '';
if ((isset($_GET['kecamatan']) && $_GET['kecamatan']) && (isset($_GET['jenis']) && $_GET['jenis'])) {
  $query = $query.'where alamat like "%'.$_GET['kecamatan'].'%" and jenis="'.$_GET['jenis'].'"';
} elseif (isset($_GET['jenis']) && $_GET['jenis']) {
  $query = $query.'where jenis="'.$_GET['jenis'].'"';
} elseif (isset($_GET['kecamatan']) && $_GET['kecamatan']) {
  $query = $query.'where alamat like "%'.$_GET['kecamatan'].'%"';
}
$Q = mysqli_query($koneksi, "SELECT * FROM wisata $query");
if ($Q) {
        $posts = array();
        if (mysqli_num_rows($Q)) {
                while ($post = mysqli_fetch_assoc($Q)) {
                        $posts[] = $post;
                }
        }
        $data = json_encode(array('results' => $posts));
        echo $data;
}
