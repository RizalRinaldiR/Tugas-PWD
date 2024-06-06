<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Ambil data kontak berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM kontak WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

// Proses update kontak
if (isset($_POST['update_kontak'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $informasi = $_POST['informasi'];

    $query = "UPDATE kontak SET nama_kontak = '$nama', informasi_kontak = '$informasi' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "Kontak berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
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
    <title>Edit Kontak</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Kontak</h2>
        <form action="edit_kontak.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama">Nama Kontak:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama_kontak']; ?>" required><br><br>
            <label for="informasi">Informasi Kontak:</label>
            <input type="text" id="informasi" name="informasi" value="<?php echo $row['informasi_kontak']; ?>" required><br><br>
            <input type="submit" name="update_kontak" value="Update Kontak">
        </form>
        <br>
        <button onclick="window.location.href='kontak.php'">Kembali</button>
    </main>
</body>
</html>
