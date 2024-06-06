<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Terbaik Versi Rizal Rinaldi Ramadhan</title>
    <link rel="stylesheet" href="tugaswebsiteterbaik.css">
</head>
<body>
<header class="header">
        <div class="logo">
            <a href="">
                <img src="https://www.itb.ac.id//themes/itbnew3/images/logo-itb-1920-new.png" alt="Institut Teknologi Bandung">
            </a>
        </div>
        <ul class="nav-menu">
            <li><a href="adminlogin.php?page=tentangitb" title="Tentang ITB">Tentang ITB</a></li>
            <li><a href="adminlogin.php?page=penerimaan" title="Penerimaan">Penerimaan</a></li>
            <li><a href="adminlogin.php?page=pendidikan" title="Pendidikan">Pendidikan</a></li>
            <li><a href="adminlogin.php?page=penelitian" title="Penelitian">Penelitian</a></li>
            <li><a href="adminlogin.php?page=pengabdian" title="Pengabdian">Pengabdian</a></li>
            <li><a href="adminlogin.php?page=penghargaan" title="Penghargaan">Penghargaan</a></li>
            <li><a href="adminlogin.php?page=multikampus" title="Multikampus">Multikampus</a></li>
            <li><a href="adminlogin.php?page=kontak" title="Kontak">Kontak</a></li>
            <div class="menu-container">
                <div class="menu-icon" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="admin/login.php">Login</a>
                    <a href="admin/signup.php">Sign Up</a>
                </div>
            </div>
        </ul>
    </header>
    <div class="satu">
    <?php
        $page = "page/tentangitb.php";
            if(isset($_GET['page'])){
                $page = 'page/'.$_GET['page'].'.php';
             }  
                require($page);
    ?>
    </div>
    
    <footer id="footer">
        <div class="footer-top">
          <div class="footer-logo">
            <a href="" class="footer-brand">
              <img src="gambar/logougm.png" alt="Universitas Gadjah Mada" class="img-responsive" data-eio="l">
              <span>Universitas Gadjah Mada</span>
            </a>
          </div>
          <div class="address">
            <h3 class="widget-title">Alamat</h3>
            <p>Bulaksumur, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
          </div>
          <div class="contact">
            <p>UNIVERSITAS GADJAH MADA</p>
            <p>Bulaksumur Yogyakarta 55281</p>
            <p>E: info@ugm.ac.id</p>
            <p>P: +62(274)588688</p>
            <p>F: +62(274)565223</p>
            <p>WA: +628112869988</p>
          </div>
          <hr>
        </div>
        <div class="footer-content">
          <ul>
            <li><h3 class="widget-title">KERJASAMA</h3></li>
            <li><a href="">Kerja Sama Dalam Negeri</a></li>
            <li><a href="">Alumni</a></li>
            <li><a href="">Urusan Internasional</a></li>
          </ul>
          <ul>
            <li><h3 class="widget-title">TENTANG UGM</h3></li>
            <li><a href="">Sambutan Rektor</a></li>
            <li><a href="">Visi dan Misi</a></li>
            <li><a href="">Tugas dan Fungsi</a></li>
            <li><a href="">Sejarah</a></li>
            <li><a href="">Pimpinan Universitas</a></li>
            <li><a href="">Manajemen</a></li>
            <li><a href="">Panduan Identitas Visual</a></li>                  
          </ul>
          <ul>
            <li><h3 class="widget-title">MENGUNJUNGI UGM</h3></li>
            <li><a href="">Peta Kampus</a></li>
            <li><a href="">Agenda</a></li>
          </ul>
          <ul>
            <li><h3 class="widget-title">PENDAFTARAN</h3></li>
            <li><a href="">Sarjana</a></li>
            <li><a href="">Pascasarjana</a></li>
            <li><a href="">Diploma</a></li>
            <li><a href="/">Profesi</a></li>
            <li><a href="">Internasional</a></li>
          </ul>
        </div>
        <div class="footer-bottom">
            <img src="gambar/hehe.jpg" alt="">
        </div>
    </footer>
    <button id="scroll-to-top" onclick="scrollToTop()" title="Go to top">Atas</button>
    <script src="script.js"></script>
</body>
</html>