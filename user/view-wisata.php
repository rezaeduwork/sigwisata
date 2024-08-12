<?php
// Koneksi ke database
include '../koneksi.php';

// Query untuk mengambil data dari tabel wisata
$lat = $_GET["lat"];
$lng = $_GET["lng"];
$query = mysqli_query($koneksi, "SELECT * FROM wisata where latitude=$lat and longitude=$lng");

// Periksa apakah query berhasil dijalankan
if ($query) {
  // Loop through hasil query
  while ($item = mysqli_fetch_assoc($query)) {
?>
    <div class="col-lg-12 col-md-6">
      <div class="item">
        <div class="row">
          <div class="col-lg-3">
            <div class="image">
              <?php
              // Tampilkan gambar jika tersedia
              if (!empty($item['gambar'])) {
              ?>
                <img src="../admin/uploads/<?php echo $item['gambar']; ?>" alt="Image">
              <?php
              } else {
              ?>
                <!-- Tampilkan gambar default jika tidak ada gambar -->
                <img src="../img/about/default-image.jpg" alt="Image">
              <?php
              }
              ?>
            </div>
          </div>
          <div class="col-lg-9">
            <ul>
              <li>
                <span class="category"><?php echo $item['nama_wisata']; ?></span>
                <h4><?php echo $item['nama_wisata']; ?></h4>
              </li>
              <li>
                <span>Alamat:</span>
                <h6><?php echo $item['alamat']; ?></h6>
              </li>
              <li>
                <span>Harga Tiket:</span>
                <h6>Rp. <?php echo $item['harga_tiket']; ?></h6>
              </li>
            </ul>
            <a href="detail.php?id_wisata=<?php echo $item['id_wisata']; ?>">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
<?php
  }
} else {
  echo "Data tidak dapat diambil.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>