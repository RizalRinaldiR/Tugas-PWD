<?php
session_start();
require_once('../pustaka/Koneksi.php');
require_once('../pustaka/User.php');

$user = new User();

if (isset($_POST['login'])) {
    $username = $user->escape_string($_POST['username']);
    $password = $user->escape_string($_POST['password']);

    // Ambil hash password dari database
    $auth = $user->check_login($username, $password);

    // Verifikasi password
    if ($auth) {
        $_SESSION['user'] = $auth;
        header("location:dashboard.php");
    } else {
        $_SESSION['message'] = 'Username dan password tidak sesuai!';
        header("location:login.php");
    }
} else {
    $_SESSION['message'] = 'Silahkan Login Terlebih Dahulu';
    header('location:login.php');
}
?>
