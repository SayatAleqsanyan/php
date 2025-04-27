<?php
session_start();

if (isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $email =  $_POST["email"];
    $password = $_POST["password"];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: ../home.php");
}else{
    $_SESSION['error'] = "Login or Password is invalid";
    header("Location: ../index.php");
}