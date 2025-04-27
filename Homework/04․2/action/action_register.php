<?php
require_once '../includes/functions.php';
require_once '../includes/csrf.php';

// Ստուգում ենք՝ օգտվողը form-ից է եկել, թե ուղղակի URL-ով
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Ստուգում ենք CSRF թոքենը
if (!csrf_verify()) {
    logError("CSRF ստուգումը չհաջողվեց (գրանցում): " . $_SERVER['REMOTE_ADDR']);
    header('Location: ../errors/error.php?message=Անվտանգության խնդիր: Խնդրում ենք նորից փորձել');
    exit;
}

// Ստանում ենք form-ի տվյալները
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$additional = $_POST['additional'] ?? '';
$gender = $_POST['gender'] ?? '';

// Ստուգում ենք, որ պարտադիր դաշտերը դատարկ չեն
if (empty($email) || empty($password) || empty($firstname) || empty($lastname) || empty($birthdate) || empty($gender)) {
    logError("Դատարկ դաշտեր գրանցման ժամանակ");
    header('Location: ../errors/error.php?message=Բոլոր պարտադիր դաշտերը պետք է լրացված լինեն');
    exit;
}

// Վավերացնում ենք email-ը
if (!validateEmail($email)) {
    logError("Սխալ email ֆորմատ (գրանցում): $email");
    header('Location: ../errors/error.php?message=Էլ. հասցեն սխալ ֆորմատով է');
    exit;
}

// Վավերացնում ենք գաղտնաբառը
if (!validatePassword($password)) {
    logError("Գաղտնաբառը չի համապատասխանում պահանջներին (գրանցում)");
    header('Location: ../errors/error.php?message=Գաղտնաբառը պետք է սկսվի մեծատառով և պարունակի թիվ, նվազագույնը 8 նիշ');
    exit;
}

// Հեշավորում ենք գաղտնաբառը
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Ստեղծում ենք օգտվողի տվյալների տողը
$user_data = "$email|$hashed_password|$firstname|$lastname|$birthdate|$additional|$gender";

// Գրում ենք տվյալները ֆայլում
$file = '../data/users.txt';
file_put_contents($file, $user_data . PHP_EOL, FILE_APPEND | LOCK_EX);

// Ավտոմատ մուտք գրանցումից հետո
$_SESSION['email'] = $email;
$_SESSION['user'] = [
    'email' => $email,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'birthdate' => $birthdate,
    'additional' => $additional,
    'gender' => $gender
];
$_SESSION['login_time'] = date('Y-m-d H:i:s');
$_SESSION['last_activity'] = time();

header('Location: ../pages/home.php');
exit;
?>