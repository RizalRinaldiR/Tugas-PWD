<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar pengabdian
function tampilkanPengabdian() {
    global $koneksi;
    $query = "SELECT * FROM pengabdian";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_pengabdian'] . " - " . $row['tahun'] . " </li>";
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
        <h2>Halaman Pengabdian</h2>
        <p>Pengabdian kepada masyarakat adalah salah satu pilar utama dari tridharma perguruan tinggi di ITB. Berbagai program pengabdian dilakukan oleh ITB untuk memberikan manfaat langsung kepada masyarakat, terutama dalam bidang pendidikan, kesehatan, lingkungan, dan teknologi.</p>
        <p>Salah satu bentuk pengabdian ITB adalah melalui program KKN (Kuliah Kerja Nyata), di mana mahasiswa diterjunkan langsung ke masyarakat untuk menerapkan ilmu yang mereka pelajari dan membantu memecahkan masalah-masalah yang ada di komunitas tersebut.</p>
        <p>ITB juga aktif dalam berbagai program kemitraan dengan pemerintah, industri, dan organisasi non-pemerintah untuk melaksanakan berbagai proyek pengabdian masyarakat yang berkelanjutan.</p>
        <p>Contoh program pengabdian ITB termasuk penyuluhan kesehatan di daerah terpencil, pengembangan teknologi tepat guna untuk usaha kecil dan menengah, serta program pelatihan untuk guru dan tenaga pengajar di berbagai daerah di Indonesia.</p>
        <p>ITB juga memiliki program "Desa Binaan" di mana mahasiswa dan dosen bekerja sama dengan masyarakat desa untuk mengembangkan potensi lokal, seperti produk pertanian, kerajinan tangan, dan pariwisata. Program ini bertujuan untuk meningkatkan kesejahteraan dan kemandirian masyarakat desa.</p>
    <?php tampilkanPengabdian();  ?>
    </main>
</body>
</html>
