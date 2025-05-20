<?php
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: homework.php');
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$birthdate = $_POST['birthdate'] ?? '';
$additional = $_POST['additional'] ?? '';
$gender = $_POST['gender'] ?? '';

if (empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
    echo "Բոլոր պարտադիր դաշտերը պետք է լրացված լինեն";
    exit;
}

if (!validateEmail($email)) {
    echo "Էլ. հասցեն սխալ ֆորմատով է";
    exit;
}

if (emailExists($email)) {
    echo "Այս էլ. հասցեն արդեն գրանցված է";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if (addUserToDatabase($email, $hashed_password, $firstname, $lastname, $birthdate, $additional, $gender)) {
    echo "Օգտատերը հաջողությամբ ավելացվել է!";
    echo "<br><a href='homework.php'>Վերադառնալ</a>";
} else {
    echo "Տեղի է ունեցել սխալ օգտատեր ավելացնելիս";
}
?>