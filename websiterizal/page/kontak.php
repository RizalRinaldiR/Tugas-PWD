<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar kontak
function tampilkanKontak() {
    global $koneksi;
    $query = "SELECT * FROM kontak";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_kontak'] . " - " . $row['informasi_kontak'] . " </li>";
    }
    echo "</ul>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="tambahan.css">
</head>
<body>
<main class="main-content">
    <h2>Halaman Kontak</h2>
    <p>Jika Anda memiliki pertanyaan lebih lanjut tentang ITB atau ingin mendapatkan informasi lebih lanjut, silakan hubungi kami melalui:</p>
    <?php tampilkanKontak(); ?>
</main>
</body>
</html>
