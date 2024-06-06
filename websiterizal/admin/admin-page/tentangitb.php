<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar tentang ITB
function tampilkanTentangITB() {
    global $koneksi;
    $query = "SELECT * FROM tentangitb";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_tentangitb'] . " - " . $row['deskripsi'] . " 
        (<a href='edit_tentangitb.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_tentangitb.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan tentang ITB baru
function tambahTentangITB($nama, $deskripsi) {
    global $koneksi;
    $query = "INSERT INTO tentangitb (nama_tentangitb, deskripsi) VALUES ('$nama', '$deskripsi')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data tentang ITB berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah tentang ITB jika ada data yang dikirimkan
if (isset($_POST['tambah_tentangitb'])) {
    $nama = $_POST['nama_tentangitb'];
    $deskripsi = $_POST['deskripsi'];
    tambahTentangITB($nama, $deskripsi);
    header("Location: tentangitb.php");
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
    <title>Tentang ITB</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Tentang ITB</h2>
        <p>Informasi tentang ITB mencakup sejarah, visi, misi, dan tujuan institusi. ITB berkomitmen untuk menjadi pusat pendidikan, penelitian, dan pengabdian kepada masyarakat yang unggul di tingkat nasional dan internasional.</p>
        <p>Berikut ini adalah beberapa informasi tentang ITB:</p>
        <?php tampilkanTentangITB(); ?>
        <h3>Tambah Informasi Tentang ITB</h3>
        <form action="tentangitb.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama_tentangitb" required><br><br>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>
            <input type="submit" name="tambah_tentangitb" value="Tambah Informasi">
        </form>
    </main>
</body>
</html>
