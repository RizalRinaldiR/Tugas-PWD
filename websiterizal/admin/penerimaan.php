<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar penerimaan
function tampilkanPenerimaan() {
    global $koneksi;
    $query = "SELECT * FROM penerimaan";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_penerimaan'] . " - " . $row['tahun'] . " 
        (<a href='edit_penerimaan.php?id=" . $row['id'] . "'>Edit</a> | 
        <a href='hapus_penerimaan.php?id=" . $row['id'] . "'>Hapus</a>)</li>";
    }
    echo "</ul>";
}

// Fungsi untuk menambahkan penerimaan baru
function tambahPenerimaan($nama, $tahun) {
    global $koneksi;
    $query = "INSERT INTO penerimaan (nama_penerimaan, tahun) VALUES ('$nama', '$tahun')";
    if (mysqli_query($koneksi, $query)) {
        echo "Penerimaan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Proses tambah penerimaan jika ada data yang dikirimkan
if (isset($_POST['tambah_penerimaan'])) {
    $nama = $_POST['nama'];
    $tahun = $_POST['tahun'];
    tambahPenerimaan($nama, $tahun);
    header("Location: penerimaan.php");
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
</head>
<body>
    <main class="main-content">
        <h2>Halaman Penerimaan</h2>
        <p>ITB memiliki beberapa jalur penerimaan untuk mahasiswa baru, yang meliputi:</p>
        <ul>
            <li><strong>Seleksi Nasional Masuk Perguruan Tinggi Negeri (SNMPTN):</strong> Jalur seleksi berdasarkan prestasi akademik siswa selama di sekolah menengah. Siswa yang memiliki prestasi akademik terbaik di sekolahnya dapat mendaftar melalui jalur ini.</li>
            <li><strong>Seleksi Bersama Masuk Perguruan Tinggi Negeri (SBMPTN):</strong> Jalur seleksi berdasarkan ujian tulis yang diselenggarakan secara nasional. Ujian ini mengukur kemampuan akademik siswa dalam berbagai mata pelajaran.</li>
            <li><strong>Jalur Mandiri:</strong> Seleksi yang diselenggarakan oleh ITB sendiri, biasanya melalui ujian atau penilaian khusus. Jalur ini memberikan kesempatan lebih bagi siswa yang memiliki prestasi khusus atau keunggulan di bidang tertentu.</li>
        </ul>
        <p>ITB juga menawarkan program beasiswa bagi calon mahasiswa yang berprestasi namun memiliki keterbatasan finansial. Beasiswa ini mencakup biaya pendidikan dan biaya hidup selama masa studi di ITB.</p>
        <?php tampilkanPenerimaan(); ?>
    <button onclick="window.location.href='dashboard.php'">Kembali ke Dashboard</button>
    </main>
</body>
</html>
