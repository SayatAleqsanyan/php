<?php

include '../config/db.php';
global $db;

if (isset($_POST['regSubmit'])) {
    $name = $_POST['name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($lastName) || empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
    }

    $sql = "INSERT INTO users (name, last_name, email, password) VALUES ('$name', '$lastName', '$email', '$password')";
    if (mysqli_query($db, $sql)) {
        header("Location: ../login.php?registration=success");
    }
    else{
        header("Location: ../index.php?error=sqlerror");
    }

}
