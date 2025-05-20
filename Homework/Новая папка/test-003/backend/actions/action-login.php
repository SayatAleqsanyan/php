<?php
session_start();
require_once './db.php';

$input = json_decode(file_get_contents('php://input'), true);
$login = $input['login'] ?? '';
$password = $input['password'] ?? '';

if (empty($login) || empty($password)) {
    echo json_encode(['message' => 'All fields are required.']);
    exit();
}

$sql = "SELECT * FROM $sql_users WHERE login = '$login' AND pass = '$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['login'] = $login;
    setcookie("token", $row['id'], time() + 3600, "/");
    echo json_encode([
        'message' => 'success',
        'id' => $row['id'],
    ]);
} else {
    echo json_encode(['message' => 'Wrong login or password.']);
}
exit();
