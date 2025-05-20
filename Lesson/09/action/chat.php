<?php
session_start();

require_once '../config/db.php';
global $db;



if (isset($_POST['add_message'])) {
    $from_id = $_SESSION['id'];
    $to_id = $_POST['to_id'];
    $message = $_POST['message'];
    $message = mysqli_real_escape_string($db, $message);
    $sql = "INSERT INTO chat (from_id, to_id, message, insert_date) 
            VALUES ('$from_id', '$to_id', '$message', current_timestamp )";
    $result = mysqli_query($db, $sql);
    if (!$result) {
        var_dump(mysqli_error($db));
    }else{
        header('Location: ../chat.php');
    }
}





