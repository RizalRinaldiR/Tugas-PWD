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
        echo "<li>" . $row['nama_kampus'] . " - " . $row['lokasi'] . " - " . $row['deskripsi'] . " 
        (<a href='edit_multikampus.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_multikampus.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan multikampus baru
function tambahMultikampus($nama, $lokasi, $deskripsi) {
    global $koneksi;
    $query = "INSERT INTO multikampus (nama_kampus, lokasi, deskripsi) VALUES ('$nama', '$lokasi', '$deskripsi')";
    if (mysqli_query($koneksi, $query)) {
        echo "Multikampus berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah multikampus jika ada data yang dikirimkan
if (isset($_POST['tambah_multikampus'])) {
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    tambahMultikampus($nama, $lokasi, $deskripsi);
    header("Location: multikampus.php");
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
    <title>Multikampus</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Multikampus</h2>
        <p>Berikut adalah daftar multikampus yang ada di ITB:</p>
        <?php tampilkanMultikampus(); ?>
        <button onclick="window.location.href='dashboard.php';">Kembali ke dashboard</button>
    </main>
</body>
</html>
