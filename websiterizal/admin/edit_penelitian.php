<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk mengambil data penelitian berdasarkan ID
function getPenelitianById($id) {
    global $koneksi;
    $query = "SELECT * FROM penelitian WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengupdate data penelitian
function updatePenelitian($id, $judul, $tahun) {
    global $koneksi;
    $query = "UPDATE penelitian SET judul_penelitian = '$judul', tahun = '$tahun' WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Proses update penelitian jika ada data yang dikirimkan
if (isset($_POST['update_penelitian'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    updatePenelitian($id, $judul, $tahun);
    header("Location: penelitian.php");
    exit();
}

// Mengambil data penelitian yang akan diedit
$id = $_GET['id'];
$penelitian = getPenelitianById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Edit Penelitian</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Penelitian</h2>
        <form action="edit_penelitian.php" method="post">
            <input type="hidden" name="id" value="<?php echo $penelitian['id']; ?>">
            <label for="judul">Judul Penelitian:</label>
            <input type="text" id="judul" name="judul" value="<?php echo $penelitian['judul_penelitian']; ?>" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo $penelitian['tahun']; ?>" required><br><br>
            <input type="submit" name="update_penelitian" value="Update Penelitian">
        </form>
        <button onclick="location.href='penelitian.php'">Kembali</button>
    </main>
</body>
</html>
