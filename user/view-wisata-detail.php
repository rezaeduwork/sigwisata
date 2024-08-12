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
  <div class="container">
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
            <div id="mapdet" style="width:100%;height:380px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
var map = L.map('mapdet').setView([<?php echo $lat; ?>, <?php echo $long; ?>], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Tambahkan marker untuk lokasi wisata berdasarkan id_wisata
var marker = L.marker([<?php echo $lat; ?>, <?php echo $long; ?>])
  .addTo(map)
  .bindPopup('<b><?php echo $nama_wisata; ?></b><br><?php echo $alamat; ?>');
</script>
<!-- End banner Area -->