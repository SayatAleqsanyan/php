<?php
session_start();

require_once '../server/db.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
    $_SESSION['log_error'] = "All fields are required.";
    header("Location: ../../index.php");
    exit();
}

$sql = "SELECT * FROM $sql_users WHERE login = '$login' AND pass = '$password'";

if ($conn -> query($sql) -> num_rows > 0) {
    session_start();
    $row = $conn -> query($sql) -> fetch_assoc();
//    var_dump($row);
//    die();
    $_SESSION['id'] = $row['id'];
    $_SESSION['login'] = $login;
    $_SESSION['log_error'] = null;
    $_SESSION['reg_error'] = null;
    $_SESSION['reg_successful'] = null;
    header("Location: ../../pages/home.php");
    exit();
} else {
    $_SESSION['reg_error'] = null;
    $_SESSION['reg_successful'] = null;
    $_SESSION['log_error'] = "Wrong login or password.";
    header("Location: ../../index.php");
    exit();
}
