<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

button {
    width: 100%;
    padding: 15px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

p {
    margin-top: 20px;
    color: #666;
}

a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}


    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="error">'.$_SESSION['message'].'</div>';
            unset($_SESSION['message']);
        }
        ?>
        <form action="proses-signup.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>