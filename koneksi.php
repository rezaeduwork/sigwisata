<?php
// $host = "localhost";
// $user = "alitelsit";
// $pass = '1234Abcde@#$_';
// $name = "db_sig";

$host = "localhost";
$user = "root";
$pass = '';
$name = "db_sig";

$koneksi = mysqli_connect($host, $user, $pass, $name);
if (mysqli_connect_errno()) {
    echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
}
//mysqli_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
