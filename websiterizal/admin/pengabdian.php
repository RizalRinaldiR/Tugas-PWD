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
        echo "<li>" . $row['nama_pengabdian'] . " - " . $row['tahun'] . " 
        (<a href='edit_pengabdian.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_pengabdian.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan pengabdian baru
function tambahPengabdian($nama, $tahun) {
    global $koneksi;
    $query = "INSERT INTO pengabdian (nama_pengabdian, tahun) VALUES ('$nama', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Pengabdian berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah pengabdian jika ada data yang dikirimkan
if (isset($_POST['tambah_pengabdian'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    tambahPengabdian($nama, $tahun);
    header("Location: pengabdian.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <main class="main-content">
        <h2>Halaman Pengabdian</h2>
        <p>Pengabdian kepada masyarakat adalah salah satu pilar utama dari tridharma perguruan tinggi di ITB. Berbagai program pengabdian dilakukan oleh ITB untuk memberikan manfaat langsung kepada masyarakat, terutama dalam bidang pendidikan, kesehatan, lingkungan, dan teknologi.</p>
        <p>Salah satu bentuk pengabdian ITB adalah melalui program KKN (Kuliah Kerja Nyata), di mana mahasiswa diterjunkan langsung ke masyarakat untuk menerapkan ilmu yang mereka pelajari dan membantu memecahkan masalah-masalah yang ada di komunitas tersebut.</p>
        <p>ITB juga aktif dalam berbagai program kemitraan dengan pemerintah, industri, dan organisasi non-pemerintah untuk melaksanakan berbagai proyek pengabdian masyarakat yang berkelanjutan.</p>
        <p>Contoh program pengabdian ITB termasuk penyuluhan kesehatan di daerah terpencil, pengembangan teknologi tepat guna untuk usaha kecil dan menengah, serta program pelatihan untuk guru dan tenaga pengajar di berbagai daerah di Indonesia.</p>
        <p>ITB juga memiliki program "Desa Binaan" di mana mahasiswa dan dosen bekerja sama dengan masyarakat desa untuk mengembangkan potensi lokal, seperti produk pertanian, kerajinan tangan, dan pariwisata. Program ini bertujuan untuk meningkatkan kesejahteraan dan kemandirian masyarakat desa.</p>
    <?php tampilkanPengabdian(); ?>
    <button onclick="window.location.href='dashboard.php'">Kembali ke Dashboard</button>
    </main>
</body>
</html>
