<?php
require_once '../includes/functions.php';
require_once '../includes/csrf.php';
require_once '../includes/users.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

if (!csrf_verify()) {
    logError("CSRF ստուգումը չհաջողվեց: " . $_SERVER['REMOTE_ADDR']);
    header('Location: ../errors/error.php?message=Անվտանգության խնդիր: Խնդրում ենք նորից փորձել');
    exit;
}

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if (!isset($_POST['captcha']) || $_POST['captcha'] !== 'security') {
    logError("Captcha-ի սխալ: " . $_SERVER['REMOTE_ADDR']);
    $_SESSION['login_attempts']++;
    header('Location: ../errors/error.php?message=Captcha-ն սխալ է: Խնդրում ենք նորից փորձել');
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$remember_me = isset($_POST['remember_me']);

if (empty($email) || empty($password)) {
    logError("Դատարկ դաշտեր մուտքի ժամանակ: " . $_SERVER['REMOTE_ADDR']);
    $_SESSION['login_attempts']++;
    header('Location: ../errors/error.php?message=Էլ. հասցեն կամ գաղտնաբառը դատարկ են');
    exit;
}

if (!validateEmail($email)) {
    logError("Սխալ email ֆորմատ: $email");
    $_SESSION['login_attempts']++;
    header('Location: ../errors/error.php?message=Էլ. հասցեն սխալ ֆորմատով է');
    exit;
}

$user = authenticateUser($email, $password);

if ($user) {
    // Հաջողված մուտք
    $_SESSION['login_attempts'] = 0;
    $_SESSION['email'] = $email;
    $_SESSION['user'] = $user;
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
    $_SESSION['last_activity'] = time();

    if ($remember_me) {
        setcookie('remember_email', $email, time() + (86400 * 30), '/');
    } else {
        if (isset($_COOKIE['remember_email'])) {
            setcookie('remember_email', '', time() - 3600, '/');
        }
    }

    header('Location: ../pages/home.php');
    exit;
} else {
    $_SESSION['login_attempts']++;
    logError("Անհաջող մուտքի փորձ: $email");
    header('Location: ../errors/error.php?message=Սխալ էլ. հասցե կամ գաղտնաբառ');
    exit;
}
?>