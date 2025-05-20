<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Home</title>
</head>
<body>
    <?php require_once '../php/block/menu.php'?>

    <section>
        <h1>Home</h1>
        <?php echo "Hello, {$_SESSION['login']}. <br>Your id is {$_SESSION['id']}!<br>"; ?>
    </section>
</body>
</html>