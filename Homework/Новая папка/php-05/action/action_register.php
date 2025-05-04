<?php
require_once '../includes/functions.php';
require_once '../includes/csrf.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

if (!csrf_verify()) {
    logError("CSRF ստուգումը չհաջողվեց (գրանցում): " . $_SERVER['REMOTE_ADDR']);
    header('Location: ../error/error.php?message=Անվտանգության խնդիր: Խնդրում ենք նորից փորձել');
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$additional = $_POST['additional'] ?? '';
$gender = $_POST['gender'] ?? '';

if (empty($email) || empty($password) || empty($firstname) || empty($lastname) || empty($birthdate) || empty($gender)) {
    logError("Դատարկ դաշտեր գրանցման ժամանակ");
    header('Location: ../error/error.php?message=Բոլոր պարտադիր դաշտերը պետք է լրացված լինեն');
    exit;
}

if (!validateEmail($email)) {
    logError("Սխալ email ֆորմատ (գրանցում): $email");
    header('Location: ../error/error.php?message=Էլ. հասցեն սխալ ֆորմատով է');
    exit;
}

if (!validatePassword($password)) {
    logError("Գաղտնաբառը չի համապատասխանում պահանջներին (գրանցում)");
    header('Location: ../error/error.php?message=Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ, նվազագույնը 8 նիշ');
    exit;
}

if (emailExists($email)) {
    logError("Այս էլ. հասցեն արդեն գրանցված է: $email");
    header('Location: ../error/error.php?message=Այս էլ. հասցեն արդեն գրանցված է');
    exit;
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if (addUserToDatabase($email, $hashed_password, $firstname, $lastname, $birthdate, $additional, $gender)) {
    $user = getUserByEmail($email);

    $_SESSION['email'] = $email;
    $_SESSION['user'] = $user;
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
    $_SESSION['last_activity'] = time();

    header('Location: ../pages/home.php');
    exit;
} else {
    logError("Գրանցման սխալ: $email");
    header('Location: ../error/error.php?message=Տեղի է ունեցել սխալ գրանցման ժամանակ');
    exit;
}
?>