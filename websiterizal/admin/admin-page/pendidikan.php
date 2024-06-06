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
        echo "<li>" . $row['nama_pendidikan'] . " - " . $row['tahun'] . " 
        (<a href='edit_pendidikan.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_pendidikan.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan pendidikan baru
function tambahPendidikan($nama, $tahun) {
    global $koneksi;
    $query = "INSERT INTO pendidikan (nama_pendidikan, tahun) VALUES ('$nama', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Pendidikan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah pendidikan jika ada data yang dikirimkan
if (isset($_POST['tambah_pendidikan'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    tambahPendidikan($nama, $tahun);
    header("Location: pendidikan.php");
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
    <title>Pendidikan</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Pendidikan</h2>
        <p>ITB menawarkan berbagai program pendidikan berkualitas tinggi yang dirancang untuk memenuhi kebutuhan industri dan masyarakat. Berikut adalah daftar program pendidikan yang ditawarkan:</p>
        <?php tampilkanPendidikan(); ?>
        <h3>Tambah Program Pendidikan Baru</h3>
        <form action="pendidikan.php" method="post">
            <label for="nama">Nama Program Pendidikan:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="tahun">Tahun:</label>
            <input type="text" id="tahun" name="tahun" required><br><br>
            <input type="submit" name="tambah_pendidikan" value="Tambah Pendidikan">
        </form>
    </main>
</body>
</html>
