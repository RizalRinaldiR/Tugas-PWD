<?php
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM pengabdian WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_pengabdian'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_pengabdian'];
    $tahun = $_POST['tahun'];

    $query = "UPDATE pengabdian SET nama_pengabdian = '$nama', tahun = '$tahun' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: pengabdian.php");
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
    <title>Edit Pengabdian</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Pengabdian</h2>
        <form action="edit_pengabdian.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label for="nama">Nama Pengabdian:</label>
            <input type="text" id="nama" name="nama_pengabdian" value="<?php echo $data['nama_pengabdian']; ?>" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo $data['tahun']; ?>" required><br><br>
            <input type="submit" name="update_pengabdian" value="Update Pengabdian">
        </form>
        <button onclick="location.href='pengabdian.php'">Kembali</button>
    </main>
</body>
</html>
