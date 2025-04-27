<?php
session_start();
//if (isset($_GET['login'])){
//    $email = $_GET["email"];
//    $password = $_GET["password"];
//
//}else{
//    echo "Empty Page:";
//}


if (isset($_POST['login']) && !empty($_POST['password'])) {
    $email =  $_POST["email"];
    $password = $_POST["password"];// regex [[1-9]$^[A-Z]]
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: home.php");
}else{
    $_SESSION['error'] = "Login or Password is invalid";
    header("Location: index.php");
}
