<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan ID tentang ITB dari URL
$id = $_GET['id'];

// Menghapus data tentang ITB berdasarkan ID
$query = "DELETE FROM tentangitb WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    header("Location: tentangitb.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
