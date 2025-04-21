<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }
    ?>
    <form action="action.php" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit" name="login">
    </form>
</body>
</html>