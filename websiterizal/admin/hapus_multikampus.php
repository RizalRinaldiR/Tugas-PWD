<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Proses hapus multikampus berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM multikampus WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "Multikampus berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    header("Location: multikampus.php");
    exit();
}
?>
