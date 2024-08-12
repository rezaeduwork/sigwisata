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

<div class="col-md-5" data-aos="zoom-in">
    <div class="panel panel-info panel-dashboard">
        <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Gambar 360 Derajat</strong></h4>
        </div>
        <div class="panel-body">
            <!-- Fullscreen button -->
            <div class="fullscreen-button" onclick="toggleFullScreen()">
                <img src="path/to/fullscreen-icon.png" alt="Fullscreen">
            </div>

            <?php if (file_exists("admin/uploads/" . $gambar360)) : ?>
                <a-scene id="panorama">
                    <a-entity camera look-controls wasd-controls position="0 1.6 0" animation="property: rotation; from: 0 -180 0; to: 0 -130 0; dur: 2000; easing: linear;"></a-entity>
                    <a-sky src="admin/uploads/<?php echo $gambar360; ?>" rotation="0 -130 0"></a-sky>
                </a-scene>
            <?php else : ?>
                <p>Gambar 360 derajat tidak ditemukan. Gambar alternatif dapat ditampilkan di sini.</p>
                <img src="admin/uploads/" alt="Gambar Alternatif" style="width: 100%; max-width: 100%;">
            <?php endif; ?>
        </div>
    </div>
</div>



<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.pannellum.org/2.5/pannellum.js"></script>
<script>
    function initialize() {
        // Inisialisasi peta
        var mymap = L.map('map').setView([<?php echo $lat ?>, <?php echo $long ?>], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        // Tambahkan marker pada peta
        var marker = L.marker([<?php echo $lat ?>, <?php echo $long ?>]).addTo(mymap);
        marker.bindPopup('<h1><?php echo $nama_wisata ?></h1><p><?php echo $alamat ?></p>').openPopup();

        // Tampilkan gambar 360 derajat
        <?php if (file_exists("admin/uploads/" . $gambar360)) : ?>
            var panorama = pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "admin/uploads/<?php echo $gambar360; ?>",
                "autoLoad": true,
                "showControls": true,
            });
        <?php endif; ?>
    }

    function toggleFullScreen() {
        var panoramaContainer = document.getElementById('panorama');

        if (!document.fullscreenElement) {
            panoramaContainer.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    }


    window.onload = function() {
        initialize();
    };
</script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-7.5675, 110.8214], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Ambil data wisata dari server, gantilah dengan cara sesuai kebutuhan Anda
    fetch('http://localhost/SIG-WISATA/ambildata.php')
        .then(response => response.json())
        .then(data => {
            // Tambahkan marker untuk setiap lokasi wisata
            data.results.forEach(wisata => {
                var marker = L.marker([wisata.latitude, wisata.longitude])
                    .addTo(map)
                    .bindPopup('<b>' + wisata.nama_wisata + '</b><br>' + wisata.alamat);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

<script src="travelista-master/js/vendor/jquery-2.2.4.min.js"></script>
<script src="travelista-master/js/popper.min.js"></script>
<script src="travelista-master/js/vendor/bootstrap.min.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>	-->
<script src="travelista-master/js/jquery-ui.js"></script>
<script src="travelista-master/js/easing.min.js"></script>
<script src="travelista-master/js/hoverIntent.js"></script>
<script src="travelista-master/js/superfish.min.js"></script>
<script src="travelista-master/js/jquery.ajaxchimp.min.js"></script>
<script src="travelista-master/js/jquery.magnific-popup.min.js"></script>
<script src="travelista-master/js/jquery.nice-select.min.js"></script>
<script src="travelista-master/js/owl.carousel.min.js"></script>
<script src="travelista-master/js/mail-script.js"></script>
<script src="travelista-master/js/main.js"></script>


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