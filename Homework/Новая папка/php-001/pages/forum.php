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
    <link rel="stylesheet" href="../css/forum.css">
    <title>Forum</title>
</head>
<body>
    <?php require_once '../php/block/menu.php'?>

    <section>
        <h1>Forum</h1>
        <form action="../php/action/action-forum.php" method="post">
            <input type="text" name="message" placeholder="Message">
            <input class="btn-send" type="submit" value="Send">
        </form>

        <div class="messages">
            <?php require_once '../php/block/messages.php'?>
        </div>
    </section>

    <script src="../js/forum.js"> </script>
</body>
</html>