<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar kontak
function tampilkanKontak() {
    global $koneksi;
    $query = "SELECT * FROM kontak";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_kontak'] . " - " . $row['informasi_kontak'] . " 
        (<a href='edit_kontak.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_kontak.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan kontak baru
function tambahKontak($nama, $informasi) {
    global $koneksi;
    $query = "INSERT INTO kontak (nama_kontak, informasi_kontak) VALUES ('$nama', '$informasi')";
    if (mysqli_query($koneksi, $query)) {
        echo "Kontak berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah kontak jika ada data yang dikirimkan
if (isset($_POST['tambah_kontak'])) {
    $nama = $_POST['nama'];
    $informasi = $_POST['informasi'];
    tambahKontak($nama, $informasi);
    header("Location: kontak.php");
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
    <title>Kontak</title>
</head>
<body>
    <main class="main-content">
        <h2>Halaman Kontak</h2>
        <p>Informasi kontak ITB dapat ditemukan di halaman ini. Jika Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut, silakan hubungi kami melalui salah satu kontak di bawah ini:</p>
        <?php tampilkanKontak(); ?>
        <h3>Tambah Kontak Baru</h3>
        <form action="kontak.php" method="post">
            <label for="nama">Nama Kontak:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="informasi">Informasi Kontak:</label>
            <input type="text" id="informasi" name="informasi" required><br><br>
            <input type="submit" name="tambah_kontak" value="Tambah Kontak">
        </form>

    </main>
</body>
</html>
