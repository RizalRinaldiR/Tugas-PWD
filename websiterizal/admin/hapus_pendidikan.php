<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menghapus data pendidikan
function hapusPendidikan($id) {
    global $koneksi;
    $query = "DELETE FROM pendidikan WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Proses hapus pendidikan jika ada data yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    hapusPendidikan($id);
    header("Location: pendidikan.php");
    exit();
}
?>
