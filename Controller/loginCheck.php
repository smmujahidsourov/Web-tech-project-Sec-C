<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ($email == "" || $password == "") {
            header('location: ../View/login.php?error=empty_fields');
            exit();
        } else {
            if ($email == "admin@gmail.com" && $password == "admin1") {
                setcookie('status', 'true', time() + 3000, '/');
                $_SESSION['email'] = $email; 
                header('location: ../View/dashboard.php');
                exit();
            } else {
                header('location: ../View/login.php?error=invalid_user');
                exit();
            }
        }
    } else {
        header('location: ../View/login.php?error=badrequest');
        exit();
    }
} else {
    header('location: ../View/login.php?error=badrequest');
    exit();
}
?>