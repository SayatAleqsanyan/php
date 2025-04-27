<?php
session_start();

if (isset($_POST['login'])
    && !empty($_POST['First_Name'])
    && !empty($_POST['Last_Name'])
    && !empty($_POST['Date_of_Birth'])
    && !empty($_POST['Country'])
    && !empty($_POST['gender'])
    && !empty($_POST['password'])
    && !empty($_POST['email'])
) {
    $email =  $_POST["email"];
    $password = $_POST["password"];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    $_SESSION['First_Name'] = $_POST['First_Name'];
    $_SESSION['Last_Name'] = $_POST['Last_Name'];
    $_SESSION['Date_of_Birth'] = $_POST['Date_of_Birth'];
    $_SESSION['Country'] = $_POST['Country'];
    $_SESSION['gender'] = $_POST['gender'];

    header("Location: ../home.php");
}else{
    $_SESSION['error'] = "Login or Password is invalid";
    header("Location: ./register_form.php");
}