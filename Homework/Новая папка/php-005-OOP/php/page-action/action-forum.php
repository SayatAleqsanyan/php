<?php
session_start();

require_once '../server/db.php';

$message = $_POST['message'];

if (empty($message)) {
    header("Location: ../pages/forum.php");
    exit();
}

$sql = "INSERT INTO $sql_forum (user_id, meseg) VALUES ('{$_SESSION['id']}', '$message')";
if ($conn -> query($sql) === TRUE) {
    header("Location: ../../pages/forum.php");
    exit();
}