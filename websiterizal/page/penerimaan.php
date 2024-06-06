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
        echo "<li>" . $row['nama_penerimaan'] . " - " . $row['tahun'] . " </li>";
    }
    echo "</ul>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambahan.css">
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
        <div class="container">
        <?php tampilkanPenerimaan(); ?>
        </div>
    </main>
</body>
</html>
