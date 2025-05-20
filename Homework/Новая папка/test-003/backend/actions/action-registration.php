<?php
session_start();
require_once './db.php';

$input = json_decode(file_get_contents('php://input'), true);

$email = $input['email'] ?? '';
$login = $input['login'] ?? '';
$password = $input['password'] ?? '';
$repeat_password = $input['repeat_password'] ?? '';

if (empty($login) || empty($password) || empty($repeat_password) || empty($email)) {
    echo json_encode(['message' => 'All fields are required.']);
    exit();
}

if ($password !== $repeat_password) {
    echo json_encode(['message' => 'Passwords do not match.']);
    exit();
}

$sql = "SELECT * FROM $sql_users WHERE login = '$login'";
if ($conn->query($sql)->num_rows > 0) {
    echo json_encode(['message' => 'A user with that name already exists.']);
    exit();
}

$sql = "SELECT * FROM $sql_users WHERE email = '$email'";
if ($conn->query($sql)->num_rows > 0) {
    echo json_encode(['message' => 'A user with that email already exists.']);
    exit();
}

$sqr = "INSERT INTO $sql_users (email, login, pass) VALUES ('$email', '$login', '$password')";
$result = $conn->query($sqr);

if ($result) {
    echo json_encode(['message' => 'success']);
} else {
    echo json_encode(['message' => 'Registration failed.']);
}
exit();
