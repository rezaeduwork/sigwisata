<?php
require_once("../vars.php");
?>
<!-- start footer Area -->
<footer>
	<div class="container">
		<div class="col-lg-12">
			<p>Copyright © 2024 Sig wisata surakarta. All rights reserved.</p>
		</div>
	</div>
</footer>
<!-- End footer Area -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
	var map = L.map('map').setView([-7.5675, 110.8214], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors'
	}).addTo(map);
  <?php
  $query = '';
  if (isset($_GET['kecamatan']) && isset($_GET['jenis'])) {
    $query = $query.'kecamatan='.$_GET['kecamatan'].'&jenis='.$_GET['jenis'];
  } elseif (isset($_GET['jenis'])) {
    $query = $query.'jenis='.$_GET['jenis'];
  } elseif (isset($_GET['kecamatan'])) {
    $query = $query.'kecamatan='.$_GET['kecamatan'];
  }
  ?>
	// Ambil data wisata dari server, gantilah dengan cara sesuai kebutuhan Anda
	fetch("<?= url('/ambildata.php?'.$query) ?>")
		.then(response => response.json())
		.then(data => {
			// Tambahkan marker untuk setiap lokasi wisata
			data.results.forEach(wisata => {
				var marker = L.marker([wisata.latitude, wisata.longitude])
        .addTo(map)
					.bindPopup(`
            <img src="<?= url('/admin/uploads') ?>${'/'+wisata.gambar}" width="100" height="100" />
            <div style="width: 200px;">
              <b>${wisata.nama_wisata}</b><br />
              ${wisata.jenis}
            </div>
          `).on('click', function() {
            console.log('alert')
            document.location.href="<?= url('/detail.php') ?>?id_wisata="+wisata.id_wisata;
            // fetch('<?= url('/user/view-wisata.php') ?>?lat='+wisata.latitude+'&lng='+wisata.longitude).then((resp) => {
            //   return resp.text();
            // }).then(data => {
            //   $('.map-detail .row').html(data)
            // })  
          }).on('mouseover',function(ev) {
            ev.target.openPopup();
          }).on('mouseout',function(ev) {
            ev.target.closePopup();
          });
			});
		})
		.catch(error => console.error('Error fetching data:', error));
</script>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/isotope.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/counter.js"></script>
<script src="../assets/js/custom.js"></script>



<!-- Vendor JS Files -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../assets/vendor/counterup/counterup.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/venobox/venobox.min.js"></script>
<script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-hover-dropdown.js"></script>
<script src="../js/script.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/datatable-bootstrap.js"></script>
</body>

</html>