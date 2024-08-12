<?php
ob_start();
include '../koneksi.php';
include 'header.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $id_komentar = $_POST['id_komentar'];
    $komentar = $_POST['komentar'];
    $rating = $_POST['rating'];

    $query = "UPDATE komentar SET komentar = '$komentar', rating = '$rating' WHERE id_komentar = '$id_komentar' AND id_user = '".$_SESSION['id_user']."'";
    mysqli_query($koneksi, $query);

    // Set success message
    $_SESSION['message'] = 'Anda berhasil mengedit komentar.';

    header("Location: data_wisata.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_komentar = $_GET['id'];
    $query = "SELECT * FROM komentar WHERE id_komentar = '$id_komentar' AND id_user = '".$_SESSION['id_user']."'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

ob_end_flush(); // Flush the output buffer
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
            </div>
          </div>
          <div class="item item-2">
            <div class="header-text">
              <span class="category">Best Result</span>
              <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>

            </div>
          </div>
          <div class="item item-3">
            <div class="header-text">
              <span class="category">Online Learning</span>
              <h2>SISTEM INFORMASI GEOGRAFIS WISATA</h2>
              <p>Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah Surakarta. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Surakarta.</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<form action="edit_komentar.php" method="post">
    <input type="hidden" name="id_komentar" value="<?php echo isset($row['id_komentar']) ? htmlspecialchars($row['id_komentar']) : ''; ?>">
    <input type="hidden" name="id_wisata" value="<?php echo isset($_GET['id_wisata']) ? htmlspecialchars($_GET['id_wisata']) : ''; ?>">
    <div class="form-group">
        <label for="komentar">Komentar:</label>
        <textarea class="form-control" name="komentar" id="komentar" rows="3" required><?php echo isset($row['komentar']) ? htmlspecialchars($row['komentar']) : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="rating">Rating:</label>
        <div class="rating">
            <input type="radio" name="rating" id="rating-5" value="5" <?php echo isset($row['rating']) && $row['rating'] == 5 ? 'checked' : ''; ?>><label for="rating-5"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="rating-4" value="4" <?php echo isset($row['rating']) && $row['rating'] == 4 ? 'checked' : ''; ?>><label for="rating-4"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="rating-3" value="3" <?php echo isset($row['rating']) && $row['rating'] == 3 ? 'checked' : ''; ?>><label for="rating-3"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="rating-2" value="2" <?php echo isset($row['rating']) && $row['rating'] == 2 ? 'checked' : ''; ?>><label for="rating-2"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="rating-1" value="1" <?php echo isset($row['rating']) && $row['rating'] == 1 ? 'checked' : ''; ?>><label for="rating-1"><i class="fas fa-star"></i></label>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>
<?php include 'footer.php';?>