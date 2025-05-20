<?php
session_start();

$title = "Home";
require_once '../php/block/header.php';
require_once '../php/block/menu.php';
?>

    <section>
        <h1>Home</h1>
        <?php echo "Hello, {$_SESSION['login']}. <br>Your id is {$_SESSION['id']}!<br>"; ?>
    </section>
</body>
</html>