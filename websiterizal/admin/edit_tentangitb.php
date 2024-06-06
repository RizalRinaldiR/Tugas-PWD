<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan ID tentang ITB dari URL
$id = $_GET['id'];

// Mendapatkan data tentang ITB berdasarkan ID
$query = "SELECT * FROM tentangitb WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$tentangitb = mysqli_fetch_assoc($result);

// Proses update data tentang ITB jika form disubmit
if (isset($_POST['update_tentangitb'])) {
    $nama = $_POST['nama_tentangitb'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE tentangitb SET nama_tentangitb = '$nama', deskripsi = '$deskripsi' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: tentangitb.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
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
    <title>Edit Tentang ITB</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Tentang ITB</h2>
        <form action="edit_tentangitb.php?id=<?php echo $id; ?>" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama_tentangitb" value="<?php echo $tentangitb['nama_tentangitb']; ?>" required><br><br>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required><?php echo $tentangitb['deskripsi']; ?></textarea><br><br>
            <input type="submit" name="update_tentangitb" value="Update Tentang ITB">
        </form>
        <button onclick="location.href='tentangitb.php'">Kembali</button>
    </main>
</body>
</html>
