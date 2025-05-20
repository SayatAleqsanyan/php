<?php
session_start();

$title = "Images Page";
require_once '../php/block/header.php';
require_once '../php/block/menu.php';
?>

<section>
    <h1>Images Page!</h1>
    <form action="../php/page-action/action-img.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <input class="btn-send" type="submit" value="Upload">
    </form>

</section>
</body>
</html>



