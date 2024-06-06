<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar penghargaan
function tampilkanPenghargaan() {
    global $koneksi;
    $query = "SELECT * FROM penghargaan";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_penghargaan'] . " - " . $row['tahun'] . " 
        (<a href='edit_penghargaan.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_penghargaan.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan penghargaan baru
function tambahPenghargaan($nama, $tahun) {
    global $koneksi;
    $query = "INSERT INTO penghargaan (nama_penghargaan, tahun) VALUES ('$nama', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Penghargaan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah penghargaan jika ada data yang dikirimkan
if (isset($_POST['tambah_penghargaan'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    tambahPenghargaan($nama, $tahun);
    header("Location: penghargaan.php");
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
    <title>Penghargaan</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Penghargaan</h2>
        <p>ITB telah menerima berbagai penghargaan atas kontribusinya dalam pendidikan, penelitian, dan pengabdian kepada masyarakat. Penghargaan ini mencerminkan dedikasi ITB dalam mencapai keunggulan dan inovasi.</p>
        <p>Beberapa penghargaan yang telah diterima ITB antara lain:</p>
        <?php tampilkanPenghargaan(); ?>
        <button onclick="location.href='dashboard.php'">Kembali</button>
    </main>
</body>
</html>
