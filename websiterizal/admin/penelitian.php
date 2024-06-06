<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar penelitian
function tampilkanPenelitian() {
    global $koneksi;
    $query = "SELECT * FROM penelitian";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['judul_penelitian'] . " - " . $row['tahun'] . " 
        (<a href='edit_penelitian.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_penelitian.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan penelitian baru
function tambahPenelitian($judul, $tahun) {
    global $koneksi;
    $query = "INSERT INTO penelitian (judul_penelitian, tahun) VALUES ('$judul', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Penelitian berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah penelitian jika ada data yang dikirimkan
if (isset($_POST['tambah_penelitian'])) {
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    tambahPenelitian($judul, $tahun);
    header("Location: penelitian.php");
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
        <h2>Halaman Penelitian</h2>
        <p>ITB memiliki komitmen yang kuat terhadap penelitian dan pengembangan ilmu pengetahuan. Banyak penelitian yang dilakukan di ITB memiliki dampak signifikan baik secara nasional maupun internasional.</p>
        <p>ITB memiliki berbagai pusat penelitian yang fokus pada berbagai bidang, seperti teknologi informasi, energi, material, lingkungan, dan bioteknologi. Beberapa penelitian ITB telah menghasilkan inovasi yang diaplikasikan di industri dan masyarakat.</p>
        <p>Selain itu, ITB juga aktif dalam kerjasama penelitian dengan berbagai institusi dan universitas di seluruh dunia, yang memungkinkan pertukaran pengetahuan dan pengembangan bersama.</p>
        <p>Salah satu contoh penelitian unggulan di ITB adalah dalam bidang energi terbarukan. ITB telah mengembangkan teknologi panel surya yang lebih efisien dan ramah lingkungan. Penelitian ini mendapat dukungan dari berbagai pihak, termasuk pemerintah dan industri, untuk diaplikasikan secara luas di Indonesia.</p>
        <p>ITB juga terlibat dalam penelitian mengenai mitigasi bencana alam, seperti gempa bumi dan tsunami. Melalui pusat penelitian kebencanaan, ITB mengembangkan sistem peringatan dini dan teknologi konstruksi bangunan tahan gempa untuk mengurangi risiko dan dampak bencana alam.</p>
        <p>Hasil-hasil penelitian di ITB sering dipublikasikan dalam jurnal internasional terkemuka, yang menunjukkan kontribusi nyata ITB dalam pengembangan ilmu pengetahuan global.</p>
        <?php tampilkanPenelitian(); ?>
        <button onclick="window.location.href='dashboard.php'">Kembali ke Dashboard</button>
    </main>
</body>
</html>
