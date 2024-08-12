<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Copyright © 2024 Sig wisata surakarta. <a href="#" target="_blank" class="pe-1 text-primary text-decoration-underline">All rights reserved.</a></p>
</div>
<!-- End of Footer -->


<script src="../assets/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/assets/js/sidebarmenu.js"></script>
<script src="../assets/assets/js/app.min.js"></script>
<script src="../assets/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/assets/libs/simplebar/dist/simplebar.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery/choosen.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Additional CSS for responsiveness -->
<style>
    @media (min-width: 768px) {
        #content-wrapper {
            margin-left: 250px;
        }

        .sidebar-collapse #content-wrapper {
            margin-left: 50px;
        }
    }
</style>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script src="js/select2/select2.full.min.js"></script>


<script>
    $(function() {
        $(".select2").select2();
    });
</script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
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