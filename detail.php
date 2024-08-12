<?php include "header.php"; ?>
<?php

$id = $_GET['id_wisata'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$id_wisata = "";
$nama_wisata = "";
$alamat = "";
$deskripsi = "";
$harga_tiket = "";
$lat = "";
$long = "";
$gambar360 = "";
foreach ($obj->results as $item) {
  $id_wisata .= $item->id_wisata;
  $nama_wisata .= $item->nama_wisata;
  $alamat .= $item->alamat;
  $deskripsi .= $item->deskripsi;
  $harga_tiket .= $item->harga_tiket;
  $lat .= $item->latitude;
  $long .= $item->longitude;
  $gambar360 .= $item->gambar;
}

$title = "Detail dan Lokasi : " . $nama_wisata;
?>
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
<br>
<br>

<!-- start banner Area -->
<section class="relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <div style="position: relative;">
          <a href="360view.php?id_wisata=<?php echo $item->id_wisata; ?>">
            <img src="admin/uploads/<?php echo $gambar360; ?>" alt="Wisata Image" style="width: 100%; max-width: 100%;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
              <img src="admin/img/360play.png" alt="Play" class="play-button">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Wisata </strong></h2>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Detail</th>
              </tr>
              <tr>
                <td>Nama Wisata</td>
                <td>
                  <h5><?php echo $nama_wisata ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat ?></h5>
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                  <h5><?php echo $deskripsi ?></h5>
                </td>
              </tr>
              <tr>
                <td>Harga Tiket</td>
                <td>
                  <h5>Rp. <?php echo $harga_tiket ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h2>
          </div>
          <div class="panel-body">
            <div id="map" style="width:100%;height:380px;"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start comment section -->
    <div class="row" style="padding-top: 20px;">
      <div class="col-md-12">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Komentar</strong></h2>
          </div>
          <div class="panel-body">
            <?php if (isset($_SESSION['id_user'])) : ?>
              <form action="submit_komentar.php" method="post">
                <input type="hidden" name="id_wisata" value="<?php echo $id_wisata; ?>">
                <div class="form-group">
                  <label for="komentar">Komentar:</label>
                  <textarea class="form-control" name="komentar" id="komentar" rows="3" required></textarea>
                </div>
                <div class="form-group">
                  <label for="rating">Rating:</label>
                  <div class="rating">
                    <input type="radio" name="rating" id="rating-5" value="5"><label for="rating-5"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="rating-4" value="4"><label for="rating-4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="rating-3" value="3"><label for="rating-3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="rating-2" value="2"><label for="rating-2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="rating-1" value="1"><label for="rating-1"><i class="fas fa-star"></i></label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <br>
            <?php else : ?>
              <p>You need to <a href="user/login.php">log in</a> to submit a comment.</p>
            <?php endif; ?>

            <!-- Menampilkan Komentar -->

          </div>
        </div>
      </div>
    </div>
    <!-- End comment section -->
    <!-- Menampilkan Komentar -->
    <div id="carouselKomentar" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        include 'koneksi.php';
        $result = mysqli_query($koneksi, "SELECT komentar.*, user.username FROM komentar JOIN user ON komentar.id_user = user.id_user WHERE id_wisata = '$id_wisata' ORDER BY komentar.id_komentar DESC");
        $first = true;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="carousel-item <?php if ($first) {
                                      echo 'active';
                                      $first = false;
                                    } ?>">
            <div class="comment-box">
              <div class="comment-header">
                <div class="comment-avatar">
                  <i class="fas fa-user-circle fa-3x"></i>
                </div>
                <div class="comment-author">
                  <h5><?php echo $row['username']; ?></h5>
                  <div class="rating">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                      <?php if ($i < $row['rating']) : ?>
                        <i class="fas fa-star"></i>
                      <?php else : ?>
                        <i class="far fa-star"></i>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </div>
                </div>
              </div>
              <div class="comment-body">
                <p><?php echo $row['komentar']; ?></p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <a class="carousel-control-prev" href="#carouselKomentar" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselKomentar" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <style>
      .comment-box {
        padding: 20px;
        border-bottom: 1px solid #eaeaea;
      }

      .comment-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }

      .comment-avatar {
        margin-right: 15px;
      }

      .comment-author h5 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
      }

      .comment-author .rating {
        color: #ffc107;
      }

      .comment-body p {
        margin: 0;
      }
    </style>
    <!-- Menampilkan Komentar -->
    <div class="comments-section">
      <?php
      include 'koneksi.php';
      $result = mysqli_query($koneksi, "SELECT komentar.*, user.username FROM komentar JOIN user ON komentar.id_user = user.id_user WHERE id_wisata = '$id_wisata' ORDER BY komentar.id_komentar DESC");
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="comment-box">
          <div class="comment-header">
            <div class="comment-avatar">
              <i class="fas fa-user-circle fa-3x"></i>
            </div>
            <div class="comment-author">
              <h5><?php echo $row['username']; ?></h5>
              <div class="rating">
                <?php for ($i = 0; $i < 5; $i++) : ?>
                  <?php if ($i < $row['rating']) : ?>
                    <i class="fas fa-star"></i>
                  <?php else : ?>
                    <i class="far fa-star"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </div>
            </div>
          </div>
          <div class="comment-body">
            <p><?php echo $row['komentar']; ?></p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <style>
      .comments-section {
        max-width: 800px;
        margin: 0 auto;
      }

      .comment-box {
        padding: 20px;
        border-bottom: 1px solid #eaeaea;
        display: flex;
        align-items: start;
        margin-bottom: 20px;
      }

      .comment-header {
        display: flex;
        align-items: center;
      }

      .comment-avatar {
        margin-right: 15px;
      }

      .comment-author {
        margin-bottom: 10px;
      }

      .comment-author h5 {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
      }

      .comment-author .rating {
        color: #ffc107;
      }

      .comment-body p {
        margin: 0;
      }
    </style>


  </div>
</section>
<!-- End about-info Area -->

<script>
      var map = L.map('map').setView([<?php echo $lat; ?>, <?php echo $long; ?>], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      // Tambahkan marker untuk lokasi wisata berdasarkan id_wisata
      var marker = L.marker([<?php echo $lat; ?>, <?php echo $long; ?>])
        .addTo(map)
        .bindPopup('<b><?php echo $nama_wisata; ?></b><br><?php echo $alamat; ?>');
    </script>
<footer>
	<div class="container">
		<div class="col-lg-12">
			<p>Copyright © 2024 Sig wisata surakarta. All rights reserved.</p>
		</div>
	</div>
</footer>
<!-- End footer Area -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/custom.js"></script>



<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-hover-dropdown.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatable-bootstrap.js"></script>
</body>

</html>

