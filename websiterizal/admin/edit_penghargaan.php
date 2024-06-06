<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk mendapatkan data penghargaan berdasarkan ID
function getPenghargaanById($id) {
    global $koneksi;
    $query = "SELECT * FROM penghargaan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengupdate data penghargaan
function updatePenghargaan($id, $nama, $tahun) {
    global $koneksi;
    $query = "UPDATE penghargaan SET nama_penghargaan = '$nama', tahun = '$tahun' WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

// Mendapatkan ID penghargaan dari URL
$id = $_GET['id'];

// Mendapatkan data penghargaan berdasarkan ID
$data = getPenghargaanById($id);

// Proses update penghargaan jika ada data yang dikirimkan
if (isset($_POST['update_penghargaan'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    if (updatePenghargaan($id, $nama, $tahun)) {
        echo "Penghargaan berhasil diupdate.";
        header("Location: penghargaan.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Edit Penghargaan</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Penghargaan</h2>
        <form action="edit_penghargaan.php?id=<?php echo $id; ?>" method="post">
            <label for="nama">Nama Penghargaan:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama_penghargaan']; ?>" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo $data['tahun']; ?>" required><br><br>
            <input type="submit" name="update_penghargaan" value="Update Penghargaan">
        </form>
        <button onclick="location.href='penghargaan.php'">Kembali</button>
    </main>
</body>
</html>
