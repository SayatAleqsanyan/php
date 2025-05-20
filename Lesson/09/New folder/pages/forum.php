<?php
session_start();

$title = "Forum";
require_once '../php/block/header.php';
require_once '../php/block/menu.php';
?>

    <section>
        <h1>Forum</h1>
        <form action="../php/page-action/action-forum.php" method="post">
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