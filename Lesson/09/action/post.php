<?php


session_start();

require_once '../config/db.php';
global $db;


if (isset($_POST['add_post'])) {
    $post_message = $_POST['post_message'];
    if (isset($_FILES['file_post']['name'])) {
        $file_name = $_FILES['file_post']['name'];
        $file_tmp = $_FILES['file_post']['tmp_name'];
        $file_size = $_FILES['file_post']['size'];
        $file_error = $_FILES['file_post']['error'];
        $file_type = $_FILES['file_post']['type'];

        $file_ext =  $_FILES['file_post']['name'];
        move_uploaded_file($file_tmp, "../uploads/post/$file_name");

    }
    if (empty($post_message) || empty($file_ext)) {
        header("location: ../home.php?error=emptyPost");
    }
    $user_id = $_SESSION['id'];
    $sql = "INSERT INTO post (file_name, post_message, user_id) VALUES ('$file_name', '$post_message', '$user_id')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header("location: ../home.php?success=postAdded");
    }
    else{
        header("location: ../home.php?error=postNotAdded");
    }

}