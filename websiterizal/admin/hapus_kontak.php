<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Hapus data kontak berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM kontak WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "Kontak berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    header("Location: kontak.php");
    exit();
}
?>
