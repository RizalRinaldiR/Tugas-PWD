<?php
session_start();

if (!isset($_SESSION['user']) || trim($_SESSION['user']) == '') {
    header('location:login.php');
    exit();
}

require_once('../pustaka/User.php');

$user = new User();

$sql = "SELECT * FROM login WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::. Administrator .::</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
#wrapper {
    display: flex;
    width: 100%;
    
    align-items: stretch;
}
#sidebar-wrapper {
    width: 250px;
    background: #343a40;
    color: white;
    padding-top: 20px;
    transition: all 0.3s;
}
.sidebar-heading {
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
}
.list-group-item {
    padding: 1rem;
    display: block;
    color: white;
    text-decoration: none;
    border: none;
    transition: background 0.3s;
}
.list-group-item:hover {
    background: #495057;
}
.list-group-item.active {
    background: #007bff;
    font-weight: bold;
}
#page-content-wrapper {
    flex: 1;
    padding: 20px;
    transition: all 0.3s;
}
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.navbar .nav-item {
    list-style: none;
    margin-left: 20px;
}
.navbar .nav-link {
    text-decoration: none;
    color: #333;
    margin-right: 10px;
    font-weight: bold;
}
.dropdown-menu {
    position: absolute;
    top: 40px;
    right: 10px;
    display: none;
    min-width: 150px;
    padding: 10px 0;
    background-color: #ffffff;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .175);
}
.dropdown-menu.show {
    display: block;
}
.dropdown-item {
    padding: .5rem 1.5rem;
    color: #212529;
    text-decoration: none;
    display: block;
    transition: background 0.3s;
}
.dropdown-item:hover {
    background-color: #f8f9fa;
}
.navbar button {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #007bff;
}
.navbar button:hover {
    color: #0056b3;
}
.container-fluid {
    margin-top: 20px;
}
.toggled #sidebar-wrapper {
    margin-left: -250px;
}
    </style>
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">Halaman Admin</div>
        <div class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item">Dashboard</a>
            <a href="dashboard.php?page=tentangitb" class="list-group-item">Tentang ITB</a>
            <a href="dashboard.php?page=penerimaan" class="list-group-item">Penerimaan</a>
            <a href="dashboard.php?page=pendidikan" class="list-group-item">Pendidikan</a>
            <a href="dashboard.php?page=penelitian" class="list-group-item">Penelitian</a>
            <a href="dashboard.php?page=pengabdian" class="list-group-item">Pengabdian</a>
            <a href="dashboard.php?page=penghargaan" class="list-group-item">Penghargaan</a>
            <a href="dashboard.php?page=multikampus" class="list-group-item">Multikampus</a>
            <a href="dashboard.php?page=kontak" class="list-group-item">Kontak</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar">
            <div class="navbar-left">
                <button id="menu-toggle">☰</button>
            </div>
            <div class="navbar-right">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="profileDropdown">
                            <?= ucwords($row['username']); ?>
                        </a>
                        <div class="dropdown-menu" id="dropdownMenu">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
            $page = 'admin-page/dashboard-main.php';
            if (isset($_GET['page'])) {
                $page = 'admin-page/' . $_GET['page'] . '.php';
            }
            require($page);
            ?>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<script>
    // Toggle sidebar function
    document.getElementById('menu-toggle').onclick = function() {
        var wrapper = document.getElementById('wrapper');
        wrapper.classList.toggle('toggled');
    };

    // Toggle dropdown function
    function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('show');
    }

    document.getElementById('profileDropdown').onclick = function(event) {
        event.preventDefault();
        toggleDropdown();
    };

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('#profileDropdown')) {
            var dropdowns = document.getElementsByClassName('dropdown-menu');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
</body>
</html>