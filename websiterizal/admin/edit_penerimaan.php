<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Mendapatkan ID penerimaan dari URL
$id = $_GET['id'];

// Mendapatkan data penerimaan berdasarkan ID
$query = "SELECT * FROM penerimaan WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$penerimaan = mysqli_fetch_assoc($result);

// Proses update data penerimaan jika form disubmit
if (isset($_POST['update_penerimaan'])) {
    $nama_penerimaan = $_POST['nama_penerimaan'];
    $tahun = $_POST['tahun'];

    $query = "UPDATE penerimaan SET nama_penerimaan = '$nama_penerimaan', tahun = '$tahun' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: penerimaan.php");
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
    <title>Edit Penerimaan</title>
</head>
<body>
    <main class="main-content">
        <h2>Edit Penerimaan</h2>
        <form action="edit_penerimaan.php?id=<?php echo $id; ?>" method="post">
            <label for="nama_penerimaan">Nama Penerimaan:</label>
            <input type="text" id="nama_penerimaan" name="nama_penerimaan" value="<?php echo $penerimaan['nama_penerimaan']; ?>" required><br><br>
            <label for="tahun">Deskripsi:</label>
            <input type="text" id="tahun" name="tahun" value="<?php echo $penerimaan['tahun']; ?>" required><br><br>
            <input type="submit" name="update_penerimaan" value="Update Penerimaan">
        </form>
        <button onclick="location.href='penerimaan.php'">Kembali</button>
    </main>
</body>
</html>
