<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar penghargaan
function tampilkanPenghargaan() {
    global $koneksi;
    $query = "SELECT * FROM penghargaan";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_penghargaan'] . " - " . $row['tahun'] . " </li>";
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
        <h2>Halaman Penghargaan</h2>
        <p>ITB telah menerima berbagai penghargaan atas kontribusinya dalam pendidikan, penelitian, dan pengabdian kepada masyarakat. Penghargaan ini mencerminkan dedikasi ITB dalam mencapai keunggulan dan inovasi.</p>
        <p>Beberapa penghargaan yang telah diterima ITB antara lain:</p>
        <ul>
            <li><strong>Penghargaan Inovasi:</strong> Atas kontribusi dalam pengembangan teknologi baru yang bermanfaat bagi masyarakat dan industri.</li>
            <li><strong>Penghargaan Pendidikan:</strong> Atas dedikasi dalam meningkatkan kualitas pendidikan tinggi di Indonesia.</li>
            <li><strong>Penghargaan Penelitian:</strong> Atas hasil penelitian yang berdampak signifikan dalam berbagai bidang ilmu pengetahuan.</li>
        </ul>
        <p>Penghargaan ini diberikan oleh berbagai lembaga nasional dan internasional, yang mengakui peran ITB dalam memajukan ilmu pengetahuan dan teknologi. Selain itu, banyak dosen dan peneliti ITB yang juga menerima penghargaan individu atas kontribusi mereka dalam bidang masing-masing.</p>
        <p>ITB juga aktif dalam berbagai kompetisi akademik dan inovasi, baik di tingkat nasional maupun internasional. Mahasiswa ITB seringkali meraih prestasi gemilang dalam berbagai kompetisi, seperti lomba karya ilmiah, kompetisi robotik, dan olimpiade sains.</p>
        <?php tampilkanPenghargaan(); ?>
    </main>
</body>
</html>
