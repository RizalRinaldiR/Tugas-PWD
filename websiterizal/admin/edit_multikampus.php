<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan data multikampus berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM multikampus WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
}

// Proses update multikampus jika ada data yang dikirimkan
if (isset($_POST['update_multikampus'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    
    $query = "UPDATE multikampus SET nama_kampus = '$nama', lokasi = '$lokasi', deskripsi = '$deskripsi' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "Multikampus berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
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
    <title>Edit Multikampus</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Multikampus</h2>
        <form action="edit_multikampus.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label for="nama">Nama Kampus:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama_kampus']; ?>" required><br><br>
            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo $data['lokasi']; ?>" required><br><br>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea><br><br>
            <input type="submit" name="update_multikampus" value="Update Multikampus">
        </form>
        <button onclick="location.href='multikampus.php'">Kembali</button>
    </main>
</body>
</html>
