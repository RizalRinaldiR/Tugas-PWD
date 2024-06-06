<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar pendidikan
function tampilkanPendidikan() {
    global $koneksi;
    $query = "SELECT * FROM pendidikan";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_pendidikan'] . " - " . $row['tahun'] . " </li>";
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
        <h2>Halaman Pendidikan</h2>
        <p>ITB menawarkan berbagai program pendidikan mulai dari sarjana (S1), magister (S2), hingga doktor (S3) dalam berbagai disiplin ilmu. Program studi yang ditawarkan meliputi bidang teknik, sains, seni, manajemen, dan humaniora.</p>
        <p>Kurikulum di ITB dirancang untuk mengembangkan kemampuan analitis dan praktis mahasiswa, dengan pendekatan pembelajaran yang berbasis penelitian. Selain itu, ITB juga menyediakan berbagai fasilitas pendukung seperti laboratorium, perpustakaan, dan pusat penelitian.</p>
        <p>Mahasiswa ITB juga didorong untuk terlibat dalam berbagai kegiatan ekstrakurikuler dan organisasi kemahasiswaan untuk mengembangkan soft skills dan jaringan profesional mereka.</p>
        <p>Program studi di ITB terus dikembangkan dan disesuaikan dengan perkembangan ilmu pengetahuan dan teknologi. Beberapa program unggulan di ITB antara lain Teknik Informatika, Teknik Mesin, Arsitektur, dan Manajemen Bisnis. Program-program ini telah mendapatkan akreditasi internasional yang menunjukkan kualitas dan relevansi kurikulum yang diajarkan.</p>
        <p>ITB juga memiliki program pendidikan jarak jauh dan online, yang memungkinkan mahasiswa dari berbagai daerah untuk mengakses pendidikan berkualitas tanpa harus berada di kampus. Program ini menggunakan teknologi digital terbaru untuk mendukung proses pembelajaran.</p>
    <?php tampilkanPendidikan(); ?>
    </main>
</body>
</html>
