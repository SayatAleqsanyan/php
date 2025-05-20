<?php
session_start();

require_once '../config/db.php';
global $db;


if (isset($_POST['loginSubmit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        Header("Location: ../login.php?error=empty");
    }
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $lastName = $row['last_name'];
    }
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['last_name'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    Header("Location: ../home.php");

}