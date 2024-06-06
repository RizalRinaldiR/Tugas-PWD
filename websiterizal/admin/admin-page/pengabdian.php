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
    <title>Pengabdian</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Pengabdian</h2>
        <p>ITB memiliki berbagai program pengabdian kepada masyarakat yang bertujuan untuk meningkatkan kesejahteraan dan kualitas hidup masyarakat. Berikut adalah daftar program pengabdian yang telah dilaksanakan:</p>
        <?php tampilkanPengabdian(); ?>
        <h3>Tambah Program Pengabdian Baru</h3>
        <form action="pengabdian.php" method="post">
            <label for="nama">Nama Program Pengabdian:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" required><br><br>
            <input type="submit" name="tambah_pengabdian" value="Tambah Pengabdian">
        </form>
    </main>
</body>
</html>
