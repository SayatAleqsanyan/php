<?php
session_start();
require_once '../includes/functions.php';
require_once '../includes/csrf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate_csrf_token($_POST['csrf_token'])) {
        log_error("CSRF token validation failed during login.");
        header("Location: ../error.php");
        exit();
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Էլ․ հասցեն և գաղտնաբառը պարտադիր են։";
        header("Location: ../index.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Սխալ էլ․ հասցե։";
        header("Location: ../index.php");
        exit();
    }

    if (!preg_match('/^[A-Z].*\d/', $password)) {
        $_SESSION['error'] = "Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ։";
        header("Location: ../index.php");
        exit();
    }

    // Ստուգում ենք օգտվողի տվյալները
    $users = file('../data/users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($saved_email, $saved_hash, $fname, $lname, $dob, $country, $gender) = explode('|', $user);
        if ($saved_email === $email && password_verify($password, $saved_hash)) {
            $_SESSION['email'] = $saved_email;
            $_SESSION['First_Name'] = $fname;
            $_SESSION['Last_Name'] = $lname;
            $_SESSION['Date_of_Birth'] = $dob;
            $_SESSION['Country'] = $country;
            $_SESSION['gender'] = $gender;
            $_SESSION['login_time'] = time();

            if (isset($_POST['remember'])) {
                setcookie("email", $email, time() + (86400 * 30), "/");
            }

            header("Location: ../pages/home.php");
            exit();
        }
    }

    $_SESSION['error'] = "Սխալ էլ․ հասցե կամ գաղտնաբառ։";
    header("Location: ../index.php");
    exit();
}
?>
