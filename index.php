<?php include "header.php";require_once("vars.php"); ?>

<!-- End banner Area -->
<div class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-carousel owl-banner">
        <div class="item item-2">
            <div class="header-text">
              <span class="category">SIG Wisata</span>
              <h2>INFORMASI GEOGRAFIS WISATA SURAKARTA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Kota Surakarta dan sekitarnya. Website ini memuat informasi dan lokasi dari tempat wisata di Kota Surakarta dan sekitarnya.</p>
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
          <div class="item item-1">
            <div class="header-text">
              <span class="category">SIG Wisata</span>
              <h2>INFORMASI GEOGRAFIS WISATA KOTA SURAKARTA</h2>
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
              <span class="category">SIG Wisata</span>
              <h2>INFORMASI GEOGRAFIS WISATA KOTA SURAKARTA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta dan sekitarnya. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>
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
<main id="main">
  <!-- Start about-info Area -->
  <section class="price-area section-gap">

    <section id="peta_wisata" class="about-info-area section-gap">
      <div class="container">

        <div class="title text-center">
          <h1 class="mb-10">Peta Lokasi Wisata</h1>
          <br>
        </div>

        <form action="" method="get" class="mb-4">
          <div class="row">
            <div class="col-md-5 d-flex align-items-center">
              <small class="mr-2 d-block" style="margin-right: 1rem;">Kecamatan: </small>
              <input type="text" class="form-control" name="kecamatan" id="" placeholder="kecamatan" value="<?= (isset($_GET['kecamatan'])) ? $_GET['kecamatan']:'' ?>" />
            </div>
            <div class="col-md-5 d-flex align-items-center">
              <small class="mr-2 d-block" style="margin-right: 1rem;">Jenis: </small>
              <select name="jenis" id="" class="form-control">
                <option value="" <?php if(!isset($_GET['jenis'])){echo 'selected';} ?>>Semua</option>
                <option value="alam" <?php if(isset($_GET['jenis']) && $_GET['jenis'] == 'alam'){echo 'selected';} ?>>Alam</option>
                <option value="budaya" <?php if(isset($_GET['jenis']) && $_GET['jenis'] == 'budaya'){echo 'selected';} ?>>Budaya</option>
                <option value="lainnya" <?php if(isset($_GET['jenis']) && $_GET['jenis'] == 'lainnya'){echo 'selected';} ?>>Lain lain.</option>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            </div>
          </div>
        </form>

        <div class="row align-items-center">

          <div id="map" style="width:100%;height:480px;"></div>
          <div class="map-detail" style="margin-top: 3.5rem;">
            <section class="events" id="events">
              <div class="container">
                <div class="row">
                </div>
              </div>
            </section>
          </div>

        </div>


      </div>
    </section>
    <!-- End about-info Area -->


    <!-- Start price Area -->

    <div class="section about-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-1">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Bagaimana cara mendaftar?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Cara mendaftar pada web ini user hanya tinggal klik login dan klik registrasi user baru di halaman login wisatawan, atau bisa klik daftar pada baner di atas.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Bagaimana cara Login?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Anda dapat mengklik tombol login di menu didalam web ini atau bisa klik login di baner.
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="section-heading">
              <h6>Tetang Web Ini</h6>
              <h2>INFORMASI GEOGRAFIS WISATA SURAKARTA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Kota Surakarta dan sekitarnya. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta dan sekitarnya.</p>
              <div class="main-button">
                <a href="user/register.php">Daftar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "footer.php"; ?>