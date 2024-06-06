-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 06:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `informasi_kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama_kontak`, `informasi_kontak`) VALUES
(4, 'Alamat', 'Jalan Ganesha No. 10, Bandung, Jawa Barat, Indonesia'),
(5, 'Telepon', '+62 22 2500935'),
(6, 'Faks', '+62 22 2500926'),
(7, 'wa', '+62 22 2500935'),
(10, 'email', 'itbcontoh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(16, 'rizal', '$2y$10$A8PkaZcZjVWP69OAaOlDXuQM3BGIIkVsM7lqC8IpSJqqRwHA2Lzhq');

-- --------------------------------------------------------

--
-- Table structure for table `multikampus`
--

CREATE TABLE `multikampus` (
  `id` int(11) NOT NULL,
  `nama_kampus` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multikampus`
--

INSERT INTO `multikampus` (`id`, `nama_kampus`, `lokasi`, `deskripsi`) VALUES
(4, 'Kampus Ganesha (Kampus Utama)', 'Jalan Ganesha No. 10, Bandung, Jawa Barat.', 'Kampus utama ITB yang terletak di kawasan pusat Bandung. Di kampus ini terdapat sebagian besar fakultas dan sekolah ITB.\r\n'),
(5, 'Kampus Jatinangor', 'Jalan Raya Jatinangor No. 126, Jatinangor, Sumedang, Jawa Barat.', 'Kampus ini terletak di Jatinangor, sekitar 25 km dari Bandung. Kampus ini merupakan lokasi bagi beberapa fakultas dan sekolah ITB, serta memiliki fasilitas yang cukup lengkap.'),
(6, 'Kampus Cirebon', ' Cirebon, Jawa Barat', 'ITB juga memiliki unit kampus di Cirebon yang fokus pada pengembangan pendidikan, penelitian, dan pengabdian kepada masyarakat di wilayah Cirebon dan sekitarnya.\r\n'),
(7, 'Kampus Jakarta selatan', 'Kampus Jakarta', 'ITB memiliki unit kampus di Jakarta yang menawarkan beberapa program studi dan kegiatan akademik lainnya. Kampus ini memberikan akses yang lebih mudah bagi mahasiswa di wilayah Jakarta dan sekitarnya.');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama_pendidikan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama_pendidikan`, `tahun`) VALUES
(2, 'Program Sarjana (S1)', 'umumnya berlangsung selama 4 tahun (8 semester)'),
(3, 'Program Magister (S2)', 'berlangsung selama 2 tahun (4 semester).'),
(4, 'Program Doktor (S3)', 'umumnya berlangsung selama 3 hingga 5 tahun, tergantung pada penelitian yang dilakukan.');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id` int(11) NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id`, `judul_penelitian`, `tahun`) VALUES
(10, 'Pembangunan Sumber Energi Terbarukan', 'Penelitian ini meliputi pengembangan teknologi energi terbarukan seperti panel surya, tenaga angin, dan bioenergi. Tahun: Berkelanjutan.'),
(11, 'Pengembangan Bahan Ramah Lingkungan', 'Penelitian ini fokus pada pengembangan bahan material yang ramah lingkungan dan berkelanjutan, seperti penggunaan bahan daur ulang dan pengembangan material hijau.'),
(12, 'Penelitian Kesehatan Masyarakat indonesia', ' ITB juga aktif dalam penelitian kesehatan masyarakat, termasuk epidemiologi penyakit menular, kesehatan lingkungan, dan promosi kesehatan. '),
(20, 'warna gas alam', 'mengetahui warna');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `nama_penerimaan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `nama_penerimaan`, `tahun`) VALUES
(3, 'Beasiswa Bidikmisi', 'Beasiswa dari pemerintah Indonesia yang diberikan kepada mahasiswa berprestasi dari keluarga kurang mampu.'),
(4, 'Beasiswa Unggulan ITB', 'Beasiswa yang diberikan oleh ITB kepada mahasiswa yang menunjukkan prestasi akademik luar biasa.'),
(5, 'Beasiswa Prestasi', 'Beasiswa ini diberikan kepada mahasiswa yang memiliki prestasi akademik atau non-akademik yang menonjol.');

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE `pengabdian` (
  `id` int(11) NOT NULL,
  `nama_pengabdian` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`id`, `nama_pengabdian`, `tahun`) VALUES
(3, 'Pelatihan dan Workshop', 'ITB menyelenggarakan berbagai pelatihan dan workshop untuk masyarakat, baik yang berkaitan dengan teknologi maupun bidang lainnya.'),
(4, 'Pemberdayaan Masyarakat', ' ITB terlibat dalam program pemberdayaan masyarakat, seperti pengembangan usaha mikro, kecil, dan menengah (UMKM), pelatihan kewirausahaan, dan pendampingan dalam pengembangan produk lokal.'),
(5, 'Konsultasi Teknis', 'ITB menyediakan layanan konsultasi teknis bagi masyarakat, baik individu maupun lembaga, dalam berbagai bidang seperti arsitektur, teknik sipil, teknik elektro, dan manajemen.'),
(6, 'Pengembangan Teknologi Ramah Lingkungan', ' ITB mengembangkan dan memperkenalkan teknologi ramah lingkungan kepada masyarakat, seperti teknologi pengolahan limbah, energi terbarukan, dan teknologi pertanian berkelanjutan.');

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL,
  `nama_penghargaan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `nama_penghargaan`, `tahun`) VALUES
(24, 'Perguruan Tinggi Terbaik di Indonesia', 'ITB sering kali masuk dalam peringkat teratas sebagai perguruan tinggi terbaik di Indonesia dalam berbagai lembaga peringkat pendidikan tinggi, baik di tingkat nasional maupun internasional.'),
(25, 'Penghargaan Prestasi Akademik Mahasiswa', 'ITB sering memperoleh penghargaan dalam kompetisi akademik tingkat nasional dan internasional, seperti kompetisi ilmiah, lomba teknologi, dan olimpiade sains.'),
(26, 'Penghargaan Penelitian dan Inovasi', ' ITB secara konsisten meraih penghargaan dalam bidang penelitian dan inovasi, baik dari pemerintah, industri, maupun lembaga internasional. Penghargaan tersebut mengakui kontribusi ITB dalam menghasilkan penelitian yang berkualitas dan inovatif.'),
(33, 'futsal', 'juara1');

-- --------------------------------------------------------

--
-- Table structure for table `tentangitb`
--

CREATE TABLE `tentangitb` (
  `id` int(11) NOT NULL,
  `nama_tentangitb` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentangitb`
--

INSERT INTO `tentangitb` (`id`, `nama_tentangitb`, `deskripsi`) VALUES
(3, 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)', 'Program Studi: Matematika, Fisika, Kimia, Astronomi, Aktuaria, dan lainnya.'),
(4, 'Fakultas Teknologi Industri (FTI)', 'Program Studi: Teknik Kimia, Teknik Industri, Teknik Fisika, Teknik Pangan, Teknik Bioenergi dan Kemurgi, dan lainnya.'),
(5, 'Fakultas Teknik Mesin dan Dirgantara (FTMD)', 'Program Studi: Teknik Mesin, Teknik Dirgantara, Teknik Material, dan lainnya.'),
(6, 'Fakultas Teknik Sipil dan Lingkungan (FTSL)', 'Program Studi: Teknik Sipil, Teknik Lingkungan, Teknik Kelautan, Teknik Sumber Daya Air, dan lainnya.\r\n'),
(7, 'Fakultas Teknik Pertambangan dan Perminyakan (FTTM)', 'Program Studi: Teknik Pertambangan, Teknik Perminyakan, Teknik Geofisika, Teknik Metalurgi, Teknik Panas Bumi, dan lainnya.'),
(8, 'Fakultas Ilmu dan Teknologi Kebumian (FITB)', 'Program Studi: Teknik Geologi, Meteorologi, Oseanografi, Teknik Geodesi dan Geomatika, dan lainnya.'),
(9, 'Fakultas Seni Rupa dan Desain (FSRD)', 'Program Studi: Desain Komunikasi Visual, Desain Interior, Desain Produk, Kriya, Seni Rupa, dan lainnya.'),
(10, 'Fakultas Teknik Elektro dan Informatika (FTE)', 'Program Studi: Teknik Elektro, Teknik Informatika, Teknik Tenaga Listrik, Sistem dan Teknologi Informasi, Teknik Telekomunikasi, dan lainnya.'),
(11, 'Sekolah Arsitektur, Perencanaan, dan Pengembangan Kebijakan (SAPPK)', 'Program Studi: Arsitektur, Perencanaan Wilayah dan Kota, Studi Pembangunan, dan lainnya.'),
(12, 'Sekolah Bisnis dan Manajemen (SBM)', 'Program Studi: Manajemen, Kewirausahaan, Bisnis Internasional, Manajemen Rekayasa Industri, dan lainnya.'),
(14, 'Sekolah Ilmu dan Teknologi Hayati (SITH) baru', 'Program Studi: Biologi, Mikrobiologi, Rekayasa Hayati, Teknologi Pasca Panen, Rekayasa Pertanian, Rekayasa Kehutanan, dan lainnya.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multikampus`
--
ALTER TABLE `multikampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentangitb`
--
ALTER TABLE `tentangitb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `multikampus`
--
ALTER TABLE `multikampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengabdian`
--
ALTER TABLE `pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tentangitb`
--
ALTER TABLE `tentangitb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
