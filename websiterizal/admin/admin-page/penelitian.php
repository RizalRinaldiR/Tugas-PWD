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
    <title>Penelitian</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Penelitian</h2>
        <p>ITB telah melakukan berbagai penelitian yang berkontribusi dalam pendidikan, teknologi, dan inovasi. Berikut adalah daftar penelitian yang telah dilakukan:</p>
        <?php tampilkanPenelitian(); ?>
        <h3>Tambah Penelitian Baru</h3>
        <form action="penelitian.php" method="post">
            <label for="judul">Judul Penelitian:</label>
            <input type="text" id="judul" name="judul" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" required><br><br>
            <input type="submit" name="tambah_penelitian" value="Tambah Penelitian">
        </form>
    </main>
</body>
</html>
