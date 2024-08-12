<?php
include "../koneksi.php";


// Pastikan id_wisata ada dan merupakan integer
if (isset($_GET['id_wisata']) && is_numeric($_GET['id_wisata'])) {
    $id = intval($_GET['id_wisata']);

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("SELECT * FROM wisata WHERE id_wisata = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $posts = array();
        if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
                $posts[] = $post;
            }
        }
        $data = json_encode(array('results' => $posts));
    } else {
        die("Query failed: " . $koneksi->error);
    }

    $stmt->close();
} else {
    die("Invalid or missing ID.");
}
?>
