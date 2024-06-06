<?php
session_start();
require_once('../pustaka/Koneksi.php');
require_once('../pustaka/User.php');

$user = new User();

if (isset($_POST['signup'])) {
    $username = $user->escape_string($_POST['username']);
    $password = password_hash($user->escape_string($_POST['password']), PASSWORD_BCRYPT);

    $conn = $user->get_connection(); // Menggunakan metode get_connection untuk mendapatkan koneksi
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = 'Sign up successful. Please login.';
        header('location:login.php');
    } else {
        $_SESSION['message'] = 'Sign up failed. Please try again.';
        header('location:signup.php');
    }
} else {
    $_SESSION['message'] = 'Please fill the form.';
    header('location:signup.php');
}
?>
