<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include "menu_topbar.php"; ?>
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Tempat Wisata</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id_wisata'];
                            $query = mysqli_query($koneksi, "select * from wisata where id_wisata='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Wisata</label>
                                        <div class="col-sm-8">
                                            <input name="id_wisata" type="text" id="id_wisata" class="form-control" value="<?php echo $data['id_wisata']; ?>" readonly />
                                            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama Wisata</label>
                                        <div class="col-sm-8">
                                            <input name="nama_wisata" type="text" id="nama_wisata" class="form-control" value="<?php echo $data['nama_wisata']; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis">Jenis Wisata</label>
                                        <select name="jenis" id="" class="form-control">
                                          <option value="alam" <?php if($data['jenis'] == 'alam'){echo 'selected';} ?>>Alam</option>
                                          <option value="budaya" <?php if($data['jenis'] == 'budaya'){echo 'selected';} ?>>Budaya</option>
                                          <option value="lainnya" <?php if($data['jenis'] == 'lainnya'){echo 'selected';} ?>>Lain lain.</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                                        <div class="col-sm-8">
                                            <!-- Menampilkan gambar yang sudah ada -->
                                            <img src="uploads/<?php echo $data['gambar']; ?>" alt="Gambar Wisata" style="max-width: 300px; max-height: 200px;">
                                            <br>
                                            <!-- Input untuk mengganti gambar -->
                                            <input type="file" name="gambar" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data['alamat']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <input name="deskripsi" class="form-control" id="deskripsi" type="text" value="<?php echo $data['deskripsi']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Harga Tiket</label>
                                        <div class="col-sm-8">
                                            <input name="harga_tiket" class="form-control" type="text" id="harga_tiket" type="text" value="<?php echo $data['harga_tiket']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Latitude</label>
                                        <div class="col-sm-8">
                                            <input name="latitude" class="form-control" id="latitude" type="text" value="<?php echo $data['latitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                                        <div class="col-sm-8">
                                            <input name="longitude" class="form-control" id="longitude" type="text" value="<?php echo $data['longitude']; ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
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
    <!-- End of Page Wrapper -->
    <?php include "footer.php"; ?>
</body>

</html>