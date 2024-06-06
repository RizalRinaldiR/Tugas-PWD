<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar multikampus
function tampilkanMultikampus() {
    global $koneksi;
    $query = "SELECT * FROM multikampus";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_kampus'] . " - " . $row['lokasi'] . " - " . $row['deskripsi'] . " </li>";
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
        <h2>Halaman Multi Kampus</h2>
        <p>ITB memiliki beberapa kampus yang tersebar di berbagai lokasi untuk mendukung kegiatan pendidikan dan penelitian. Setiap kampus dilengkapi dengan fasilitas yang mendukung proses belajar mengajar dan penelitian.</p>
        <p>Kampus utama ITB terletak di Jalan Ganesha, Bandung. Selain itu, ITB memiliki kampus lain di Jatinangor, Cirebon, dan beberapa lokasi lainnya. Setiap kampus memiliki fokus dan spesialisasi yang berbeda, sesuai dengan kebutuhan akademik dan penelitian.</p>
        <p>Dengan sistem multi kampus ini, ITB mampu menjangkau lebih banyak mahasiswa dan menyediakan lebih banyak peluang untuk penelitian dan pengembangan ilmu pengetahuan di berbagai daerah.</p>
        <p>Kampus ITB Jatinangor, misalnya, fokus pada pengembangan program studi kesehatan dan kedokteran, dengan fasilitas laboratorium dan rumah sakit pendidikan yang lengkap. Kampus ITB Cirebon, di sisi lain, lebih fokus pada pengembangan teknologi maritim dan perikanan.</p>
        <p>Sistem multi kampus ini juga memungkinkan ITB untuk berkolaborasi lebih erat dengan pemerintah daerah, industri lokal, dan komunitas setempat untuk mengembangkan program-program yang sesuai dengan kebutuhan dan potensi lokal.</p>
        <p>Berikut adalah daftar multikampus yang ada di ITB:</p>
        <?php tampilkanMultikampus(); ?>
    </main>
</body>
</html>

