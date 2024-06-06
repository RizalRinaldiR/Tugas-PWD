<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubes");

// Fungsi untuk menampilkan daftar tentang ITB
function tampilkanTentangITB() {
    global $koneksi;
    $query = "SELECT * FROM tentangitb";
    $result = mysqli_query($koneksi, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['nama_tentangitb'] . " - " . $row['deskripsi'] . " </li>";
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
    <style>
    .container {
    width: 100%;
    max-width: 1300px;
    margin: 30px 30px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

 ul {
    list-style-type: disc;
    margin-left: 20px;
    margin-top: 10px;
}

ul li {
    margin-bottom: 10px;
}

.container p {
    color: #555;
    line-height: 1.8;
}

    </style>
</head>
<body>
<main>
        <div class="background-image"></div>
        <div class="info-boxes-container">
            <div class="info-box">
                <div class="info">
                    <div class="info-inner">
                        <img src="gambar/topi.png" alt="Why UI">
                        <h3>Why UI?</h3>
                        <a href="" class="more-info">Selengkapnya</a>
                    </div>
                </div>
                <img src="gambar/ui.jpg" alt="Image 1">
                <p>UI adalah salah satu universitas riset atau institusi akademik terkemuka di dunia yang terus mengejar pencapaian tertinggi dalam hal penemuan, pengembangan dan difusi pengetahuan secara regional dan global. Dengan prestasi yang terus diraihnya UI berada di peringkat kampus terbaik di Indonesia berdasarkan penilaian Lembaga pemeringkatan dunia.</p>
                <div class="read-more"><a href="#">Selengkapnya &#10230;</a></div>
            </div>
            <div class="info-box">
                <div class="info">
                    <div class="info-inner">
                        <img src="gambar/fakultas.png" alt="Faculties">
                        <h3>Faculties?</h3>
                        <a href="" class="more-info">Selengkapnya</a>
                    </div>
                </div>
                <img src="gambar/ui2.jpg" alt="Image 2">
                <p>Sejarah Universitas Indonesia dimulai sejak 1849 dimana UI menjadi representasi institusi pendidikan dengan sejarah tertua di Asia. Hingga hari ini, UI terus memainkan peran penting di tingkat nasional dan global. Memiliki 17 Fakultas dengan lulusan yang kompeten,  UI mengemban misi menjadi lembaga pendidikan yang unggul dan kualitas berstandar dunia. </p>
                <div class="read-more"><a href="#">Selengkapnya &#10230;</a></div>
            </div>
            <div class="info-box">
                <div class="info">
                    <div class="info-inner">
                        <img src="gambar/seimbang.png" alt="Campus Life">
                        <h3>Campus Life?</h3>
                        <a href="" class="more-info">Selengkapnya</a>
                    </div>
                </div>
                <img src="gambar/ui3.jpg" alt="Image 3">
                <p>Kampus kami adalah tempat berkumpulnya orang-orang yang kreatif, dinamis, dan menginspirasi untuk tumbuh bersama.</p>
                <div class="read-more"><a href="#">Selengkapnya &#10230;</a></div>
            </div>
        </div>
    </main>
    <br>
    <br>
    <div class="informasi">
        <div class="container">
            <h3>Akademik</h3>
            <br>
            <p>ITB memiliki 12 fakultas yang mencakup berbagai disiplin ilmu, mulai dari teknik, sains, seni rupa, dan manajemen. Program yang ditawarkan meliputi program sarjana (S1), magister (S2), dan doktor (S3).</p>
            <br>
            <?php tampilkanTentangITB(); ?>
        </div>
    </div>
    <main class="secondary">
        <div class="news">
            <div class="video-section">
                <div class="title-box">
                    <div class="title">
                        Campus Video
                        <div class="divider"></div>
                    </div>
                </div>
                <video src="https://youtu.be/bHyHFFB78p8" controls></video>
            </div>
            <div class="text-section">
                <h2 class="section-title">Berita Kampus & Update</h2>
                <div class="divider"></div>
                <div class="news-columns">
                    <div class="news-item">
                        <div class="news-image"><img src="gambar/berita1.jpg" alt=""></div>
                        <div class="news-date">15/03/2024</div>
                        <div class="news-title">
                            UI Umumkan 34 Calon Majelis Wali Amanat UI Unsur Masyarakat Yang Lolos Seleksi Tahap Administrasi
                        </div>
                    </div>
                    <div class="news-item">
                        <div class="news-image"><img src="gambar/berita3.jpeg" alt=""></div>
                        <div class="news-date">14/03/2024</div>
                        <div class="news-title">
                            UI Tertinggi se-Indonesia versi EduRank 2024 dan Makin Naik di Tingkat Global
                        </div>
                    </div>
                    <div class="news-item">
                        <div class="news-image"><img src="gambar/berita3.jpeg" alt=""></div>
                        <div class="news-date">14/03/2024</div>
                        <div class="news-title">
                            UI Tertinggi se-Indonesia versi EduRank 2024 dan Makin Naik di Tingkat Global
                        </div>
                    </div>
                    <div class="news-item">
                        <div class="news-image"><img src="gambar/berita1.jpg" alt=""></div>
                        <div class="news-date">15/03/2024</div>
                        <div class="news-title">
                            UI Umumkan 34 Calon Majelis Wali Amanat UI Unsur Masyarakat Yang Lolos Seleksi Tahap Administrasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
