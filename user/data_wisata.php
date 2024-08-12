<?php include "header.php"; ?>
<!-- start banner Area -->
<div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Our Courses</span>
                <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
                <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="user/register.php">Daftar</a>
                  </div>
                  <div class="icon-button">
                    <a href="user/login.php"><i class="fa fa-play"></i> Login?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
                <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="user/register.php">Daftar</a>
                  </div>
                  <div class="icon-button">
                    <a href="user/login.php"><i class="fa fa-play"></i> Login?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Learning</span>
                <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
                <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="user/register.php">Daftar</a>
                  </div>
                  <div class="icon-button">
                    <a href="user/login.php"><i class="fa fa-play"></i> Login?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="events" id="events">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h2>Daftar Wisata</h2>
        </div>
      </div>
      <?php
      // Koneksi ke database
      include '../koneksi.php';

      // Query untuk mengambil data dari tabel wisata
      $query = mysqli_query($koneksi, "SELECT * FROM wisata");
      
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
    </div>
  </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>