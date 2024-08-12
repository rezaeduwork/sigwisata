<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
    exit;
}
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php"; ?>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <?php include "menu_sidebar.php"; ?>
    <div class="body-wrapper">
      <?php include "menu_topbar.php"; ?>
      <div class="container-fluid">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                  <div class="card w-100">
                    <div class="card-body">
                      <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                          <h5 class="card-title fw-semibold">Monitoring</h5>
                        </div>
                        <div class="main-button">
                          <a href="../index.php" class="btn btn-primary">Lihat Web</a>
                        </div>
                      </div>
                      <div id="chart">
                        <canvas id="wisataChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <section id="peta_wisata" class="about-info-area section-gap">
                <div class="container">
                  <div class="title text-center">
                    <h1 class="mb-10">Peta Lokasi Wisata</h1>
                    <br>
                  </div>
                  <div class="row align-items-center">
                    <div id="map" style="width: 80%; height: 480px; margin: auto;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
                    <script type="text/javascript">
                      function initialize() {
                        var mapOptions = {
                          zoom: 10.2,
                          center: new google.maps.LatLng(-7.4302745, 109.199404),
                          disableDefaultUI: false
                        };
                        var mapElement = document.getElementById('map');
                        var map = new google.maps.Map(mapElement, mapOptions);
                        setMarkers(map, officeLocations);
                      }

                      var officeLocations = [
                        <?php
                        $data = file_get_contents('http://localhost/SIG-WISATA/ambildata.php');
                        if (json_decode($data, true)) {
                          $obj = json_decode($data);
                          foreach ($obj->results as $item) {
                            echo "[{$item->id_wisata}, '{$item->nama_wisata}', '{$item->alamat}', {$item->longitude}, {$item->latitude}],";
                          }
                        }
                        ?>
                      ];

                      function setMarkers(map, locations) {
                        var globalPin = 'img/marker.png';
                        for (var i = 0; i < locations.length; i++) {
                          var office = locations[i];
                          var myLatLng = new google.maps.LatLng(office[4], office[3]);
                          var contentString = '<div id="content">' +
                            '<div id="siteNotice"></div>' +
                            '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
                            '<div id="bodyContent">' +
                            '<a href=detail.php?id_wisata=' + office[0] + '>Info Detail</a>' +
                            '</div></div>';

                          var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: office[1],
                            icon: 'img/markermap.png'
                          });

                          google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                        }
                      }

                      function getInfoCallback(map, content) {
                        var infowindow = new google.maps.InfoWindow({
                          content: content
                        });
                        return function() {
                          infowindow.setContent(content);
                          infowindow.open(map, this);
                        };
                      }

                      initialize();
                    </script>
                  </div>
                </div>
              </section>
            </div>
          </section>
        </div>
      </div>
      <?php include "footer.php"; ?>
    </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Include Chart.js Library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Wisata Chart Script -->
  <script>
    // Fetch data from countsma.php
    fetch('../countsma.php')
      .then(response => response.json())
      .then(data => {
        var smaCount = data.results[0].sma;

        var ctx = document.getElementById('wisataChart').getContext('2d');
        var wisataChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Jumlah Wisata'],
            datasets: [{
              label: 'Jumlah',
              data: [smaCount],
              backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      })
      .catch(error => console.error('Error fetching data:', error));
  </script>
</body>

</html>
