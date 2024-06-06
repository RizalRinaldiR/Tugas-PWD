<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan ID penghargaan dari URL
$id = $_GET['id'];

// Fungsi untuk menghapus data penghargaan berdasarkan ID
function hapusPenghargaan($id) {
    global $koneksi;
    $query = "DELETE FROM penghargaan WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Proses hapus penghargaan jika ID tersedia
if (hapusPenghargaan($id)) {
    echo "Penghargaan berhasil dihapus.";
    header("Location: penghargaan.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
