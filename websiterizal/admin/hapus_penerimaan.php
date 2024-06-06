<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan ID penerimaan dari URL
$id = $_GET['id'];

// Menghapus data penerimaan berdasarkan ID
$query = "DELETE FROM penerimaan WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    header("Location: penerimaan.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
