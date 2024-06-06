<?php
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM pengabdian WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: pengabdian.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
