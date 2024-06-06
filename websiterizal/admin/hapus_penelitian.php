<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menghapus data penelitian
function hapusPenelitian($id) {
    global $koneksi;
    $query = "DELETE FROM penelitian WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Proses hapus penelitian jika ada data yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    hapusPenelitian($id);
    header("Location: penelitian.php");
    exit();
}
?>
