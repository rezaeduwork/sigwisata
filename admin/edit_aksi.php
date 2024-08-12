<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id_wisata'];
$nama = $_POST['nama_wisata'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$harga_tiket = $_POST['harga_tiket'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$jenis = $_POST['jenis'];

// cek apakah ada file gambar yang dikirim
if ($_FILES['gambar']['name'] != "") {
    // menyimpan gambar baru
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $gambar);

    // menghapus gambar lama
    $query_hapus_gambar = mysqli_query($koneksi, "SELECT gambar FROM wisata WHERE id_wisata = '$id'");
    $gambar_lama = mysqli_fetch_assoc($query_hapus_gambar)['gambar'];
    unlink("uploads/" . $gambar_lama);

    // update data ke database termasuk nama gambar yang baru
    mysqli_query($koneksi, "UPDATE wisata SET nama_wisata='$nama', alamat='$alamat', deskripsi='$deskripsi', harga_tiket='$harga_tiket', latitude='$latitude', longitude='$longitude', gambar='$gambar', jenis='$jenis' WHERE id_wisata='$id'");
} else {
    // jika tidak ada gambar yang dikirim, update data tanpa memperbarui gambar
    mysqli_query($koneksi, "UPDATE wisata SET nama_wisata='$nama', alamat='$alamat', deskripsi='$deskripsi', harga_tiket='$harga_tiket', latitude='$latitude', longitude='$longitude', jenis='$jenis' WHERE id_wisata='$id'");
}

// mengalihkan halaman kembali ke tampil_data.php
header("location:tampil_data.php");
?>
