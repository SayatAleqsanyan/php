<?php
session_start();

require_once '../server/db.php';

$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

$userId = $_SESSION['id'];
$uploadDir = "../../public/users_img/$userId/";

$new_name = uniqid() . 'action' .  pathinfo($name, PATHINFO_EXTENSION);
$uploadFile = $uploadDir . $new_name;

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$sql = "INSERT INTO $sql_img (user_id, name) VALUES ('{$_SESSION['id']}', '$new_name')";

if (move_uploaded_file($tmp_name, $uploadFile) && $conn -> query($sql) === TRUE) {
    header("Location: ../../../pages/images_page.php");
} else {
    $_SESSION["img_error"] = "Failed to upload the image.";
    header("Location: ../../../pages/images_page.php");
}
exit();












