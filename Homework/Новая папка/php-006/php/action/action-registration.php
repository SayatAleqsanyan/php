<?php
session_start();
require_once '../server/db.php';

$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

if (empty($login) || empty($password) || empty($repeat_password) || empty($email)) {

    $_SESSION['reg_error'] = "All fields are required.";
    header("Location: ../../pages/login.html");
    exit();
}

if ($password !== $repeat_password) {
    $_SESSION['reg_error'] = "Passwords do not match.";
    header("Location: ../../pages/login.html");
    exit();
}


$sql = "SELECT * FROM $sql_users WHERE login = '$login'";
if ($conn->query($sql)->num_rows > 0) {
    $_SESSION['reg_error'] = "A user with that name already exists.";
    header("Location: ../../pages/login.html");
    exit();
}

$sql = "SELECT * FROM $sql_users WHERE email = '$email'";
if ($conn->query($sql)->num_rows > 0) {
    $_SESSION['reg_error'] = "A user with that email already exists.";
    header("Location: ../../pages/login.html");
    exit();
}

$sqr = "INSERT INTO $sql_users (email, login, pass) VALUES ('$email', '$login', '$password')";

$result = $conn -> query($sqr);

if ($result) {
    $_SESSION['reg_error'] = null;
    $_SESSION['log_error'] = null;
    $_SESSION['reg_successful'] = 'Registration was successful.';
    header("Location: ../../pages/login.html");
    exit();
} else {
    $_SESSION['reg_successful'] = null;
    $_SESSION['reg_error'] = "Wrong login or password.";
    exit();
}
