<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk mengambil data pendidikan berdasarkan ID
function getPendidikanById($id) {
    global $koneksi;
    $query = "SELECT * FROM pendidikan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengupdate data pendidikan
function updatePendidikan($id, $nama, $tahun) {
    global $koneksi;
    $query = "UPDATE pendidikan SET nama_pendidikan = '$nama', tahun = '$tahun' WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Proses update pendidikan jika ada data yang dikirimkan
if (isset($_POST['update_pendidikan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    updatePendidikan($id, $nama, $tahun);
    header("Location: pendidikan.php");
    exit();
}

// Mengambil data pendidikan yang akan diedit
$id = $_GET['id'];
$pendidikan = getPendidikanById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Edit Pendidikan</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Pendidikan</h2>
        <form action="edit_pendidikan.php" method="post">
            <input type="hidden" name="id" value="<?php echo $pendidikan['id']; ?>">
            <label for="nama">Nama Program Pendidikan:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $pendidikan['nama_pendidikan']; ?>" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo $pendidikan['tahun']; ?>" required><br><br>
            <input type="submit" name="update_pendidikan" value="Update Pendidikan">
        </form>
        <button onclick="location.href='pendidikan.php'">Kembali</button>
    </main>
</body>
</html>
