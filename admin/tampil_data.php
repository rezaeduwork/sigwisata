<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
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
                    <!-- Main Content -->
                    <div id="content" class="flex-grow-1">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Wisata Surakarta</h6>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Tambah Data Wisata</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama Wisata</th>
                                                    <th>Gambar</th>
                                                    <th>Jenis</th>
                                                    <th>Alamat</th>
                                                    <th>Harga Tiket</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $data = mysqli_query($koneksi, "SELECT * FROM wisata");
                                                while ($d = mysqli_fetch_array($data)) {
                                                    $no++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td><b><a href="detail_data.php?id_wisata=<?php echo $d['id_wisata']; ?>"> <?php echo $d['nama_wisata']; ?> </a></b></td>
                                                        <td><?php
                                                            $gambar_path = "uploads/" . $d['gambar'];
                                                            if (file_exists($gambar_path)) {
                                                                echo "<img src='" . $gambar_path . "' alt='Gambar Wisata' style='width: 100px; height: auto;'>";
                                                            } else {
                                                                echo "Gambar tidak ditemukan";
                                                            }
                                                            ?></td>
                                                        <td>
                                                          <?= $d['jenis'] ?>
                                                        </td>
                                                        <td><?php echo $d['alamat']; ?></td>
                                                        <td>Rp. <?php echo $d['harga_tiket']; ?></td>
                                                        <td><?php echo $d['latitude']; ?></td>
                                                        <td><?php echo $d['longitude']; ?></td>
                                                        <td>
                                                            <a href="edit_data.php?id_wisata=<?php echo $d['id_wisata']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></span></a>
                                                            <a href="hapus_aksi.php?id_wisata=<?php echo $d['id_wisata']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->
            </div>
            <?php include "footer.php"; ?>

            <!-- End of Page Wrapper -->

            <!-- Modal for Adding Data Wisata -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="tambahDataForm" action="tambah_aksi.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_wisata">Nama Wisata</label>
                                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" placeholder="Nama Wisata" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Wisata</label>
                                    <select name="jenis" id="" class="form-control">
                                      <option value="alam">Alam</option>
                                      <option value="budaya">Budaya</option>
                                      <option value="lainnya">Lain lain.</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar 360-Derajat</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                                    <small class="form-text text-muted">Upload gambar 360-derajat untuk tempat wisata.</small>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_tiket">Harga Tiket</label>
                                    <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Harga Tiket" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-7.3811577" required>
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="109.2550945" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>