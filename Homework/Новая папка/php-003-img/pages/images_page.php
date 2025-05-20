<?php
session_start();
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
    <title>Images Page</title>
</head>
<body>
<?php require_once '../php/block/menu.php'?>

<section>
    <h1>Images Page!</h1>
    <form action="../php/action/action-img.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <input class="btn-send" type="submit" value="Upload">
    </form>

</section>
</body>
</html>



