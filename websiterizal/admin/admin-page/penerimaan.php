<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar penerimaan
function tampilkanPenerimaan() {
    global $koneksi;
    $query = "SELECT * FROM penerimaan";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_penerimaan'] . " - " . $row['tahun'] . " 
        (<a href='edit_penerimaan.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_penerimaan.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan penerimaan baru
function tambahPenerimaan($nama, $tahun) {
    global $koneksi;
    $query = "INSERT INTO penerimaan (nama_penerimaan, tahun) VALUES ('$nama', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Penerimaan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah penerimaan jika ada data yang dikirimkan
if (isset($_POST['tambah_penerimaan'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    tambahPenerimaan($nama, $tahun);
    header("Location: penerimaan.php");
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
    <title>Penerimaan</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Penerimaan</h2>
        <p>ITB membuka berbagai jalur penerimaan untuk calon mahasiswa baru. Berikut adalah daftar jalur penerimaan yang tersedia:</p>
        <?php tampilkanPenerimaan(); ?>
        <h3>Tambah Jalur Penerimaan Baru</h3>
        <form action="penerimaan.php" method="post">
            <label for="nama">Nama Jalur Penerimaan:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="tahun">Deskripsi</label>
            <input type="text" id="tahun" name="tahun" required><br><br>
            <input type="submit" name="tambah_penerimaan" value="Tambah Penerimaan">
        </form>
    </main>
</body>
</html>
