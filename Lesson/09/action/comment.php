<?php
session_start();

require_once '../config/db.php';
global $db;


if (isset($_POST['add_comment'])){
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment_message'];

    $file_name = null;
    if (isset($_FILES['file_comment']['name'])) {
        $file_name = $_FILES['file_comment']['name'];
        $file_tmp = $_FILES['file_comment']['tmp_name'];

        $file_ext =  $_FILES['file_comment']['name'];
        move_uploaded_file($file_tmp, "../uploads/comment/$file_name");

    }
    $sql = "INSERT INTO comment (post_id, user_id, file, message)
            VALUES ('$post_id', '$user_id', '$file_name', '$comment')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header("location: ../home.php?add_comment=success");
    }else{
        header("location: ../home.php?add_comment=error");
    }
}else{
    header('Location: ../home.php');
}



