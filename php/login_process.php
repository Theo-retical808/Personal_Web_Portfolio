
<?php
session_start();


$adminUsername = 'admin';
$adminPassword = 'password'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === $adminUsername && password_verify($password, password_hash($adminPassword, PASSWORD_DEFAULT))) {
        $_SESSION['admin_logged_in'] = true;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>location.href = '../admin/home.php';</script>";
    } else {
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>location.href = '../index.php';</script>";
    }
}
