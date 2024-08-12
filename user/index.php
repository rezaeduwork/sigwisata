<?php include "header.php"; require_once("../vars.php"); ?>

<!-- End banner Area -->
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
                    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap "></script>

                    <script type="text/javascript">
                        var infoWindow;
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
                            $data = file_get_contents(url('/ambildata.php'));
                            $no = 1;
                            if (json_decode($data, true)) {
                                $obj = json_decode($data);
                                foreach ($obj->results as $item) {
                            ?>
                              [
                                <?php echo $item->id_wisata ?>, 
                                '<?php echo $item->nama_wisata ?>', 
                                '<?php echo $item->alamat ?>', 
                                <?php echo $item->longitude ?>, 
                                <?php echo $item->latitude ?>
                              ],
                            <?php
                              }
                            }
                            ?>
                        ];
//klik mouse lokasi muncul tulisan nama wisata dan detail
                        function setMarkers(map, locations) {
                            var globalPin = '../img/marker.png';

                            for (var i = 0; i < locations.length; i++) {

                                var office = locations[i];
                                var myLatLng = new google.maps.LatLng(office[4], office[3]);
                                var infowindow = new google.maps.InfoWindow({
                                    content: contentString
                                });

                                var contentString =
                                    '<div id="content">' +
                                    '<div id="siteNotice">' +
                                    '</div>' +
                                    '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
                                    '<div id="bodyContent">' +
                                    '<a href=detail.php?id_wisata=' + office[0] + '>Info Detail</a>' +
                                    '</div>' +
                                    '</div>';

                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    title: office[1],
                                    icon: '../img/markermap.png'
                                });

                                google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString, [office[4], office[3]]));

                                infowindow = new google.maps.InfoWindow({
                                  content: contentString
                                });
                            }
                        }

                        function getInfoCallback(map, content, myLatLng = null) {
                          return function() {
                              infowindow.setContent(content);
                              infowindow.open(map, this);
                          };
                        }

                        initialize();
                    </script> -->

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
              <h6>About Us</h6>
              <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>
              <div class="main-button">
                <a href="#">Discover More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require_once("footer.php"); ?>