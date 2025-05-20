<?php
session_start();

require_once '../config/db.php';
global $db;


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    if (empty($email) || empty($password) || empty($name) || empty($last_name)) {
        Header("Location: ../home.php?error=empty");
    }
    $file = null;
    if (isset($_FILES['file'])) {
        $filename = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];

        move_uploaded_file($file_tmp, "../uploads/" . $filename);
        $file = $filename;
    }

    $sql = "UPDATE users SET 
                 name='$name', 
                 last_name='$last_name', 
                 email='$email', 
                 password='$password',
                 file='$file'
             WHERE id='$id'";
    $result = mysqli_query($db, $sql);

    $sql_select = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($db, $sql_select);
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
    }
    Header("Location: ../home.php?success=update");

}

if (isset($_POST['add'])) {
    $id = $_SESSION['id'];
    if (empty($_FILES['file'])) {
        Header("Location: ../home.php?error=emptyFile");
    }

    if (isset($_FILES['file'])) {
        $filename = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];

        move_uploaded_file($file_tmp, "../uploads/" . $filename);

        $sql = "UPDATE users SET file='$filename' WHERE id='$id'";

        mysqli_query($db, $sql);

    }


    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['file'] = $row['file'];
    }

    Header("Location: ../home.php?success=add");

}