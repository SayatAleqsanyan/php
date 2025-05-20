<?php
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
    <link rel="stylesheet" href="../css/cards.css">
    <title><?php echo $title ?? "Project" ?></title>
</head>
<body>