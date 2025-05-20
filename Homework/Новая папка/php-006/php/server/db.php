<?php

//$servername = "MySQL-8.0";
//$username = "root";
//$password = "";
//$dbname = "app_date";
//
//$sql_users = "test_users";
//$sql_forum = "forum";
//
//$conn = mysqli_connect($servername, $username, $password, $dbname);
//
//if (!$conn) {
//    die("Connection failed: " . $conn->connect_error);
//}
//if (!$conn -> set_charset('utf8')) {
//    echo "UTF-8 կոդաորումը չհաջողվեց";
//}


// Միացում սերվերին առանց բազա ընտրելու
$host = "MySQL-8.0";
$user = "root";
$password = "";
$database = "app_date";

$sql_users = "test_users";
$sql_img = "friend_requests";
$sql_post = "posts";
$sql_like = "post_like";

require_once "databaseCheck.php"; // database ստուգում
require_once "tableCheck.php";

// $conn - ով ենք կապ հաստատում

// Աղյուսակների սյունակները
$userColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'email' => 'VARCHAR(255) UNIQUE NOT NULL',
    'login' => 'VARCHAR(32) UNIQUE NOT NULL',
    'pass' => 'VARCHAR(32) NOT NULL'
];

$imgColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'name' => 'VARCHAR(255) NOT NULL',
    'user_id' => 'INT NOT NULL',
    'add_date' => 'DATETIME DEFAULT CURRENT_TIMESTAMP'
];

$postColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'user_id' => 'INT NOT NULL',
    'post_add_date' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
    'post_title' => 'VARCHAR(255) NOT NULL',
    'post_body' => 'TEXT NOT NULL',
    'img_id' => 'INT'
];

$likeColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'user_id' => 'INT NOT NULL',
    'post_id' => 'INT NOT NULL',
    'status' => 'INT NOT NULL'
];


// Աղյուսակների ստեղծում (օգտագործելով ֆունկցիան)
createTable($conn, $database, $sql_users, $userColumns);
createTable($conn, $database, $sql_img, $imgColumns);
createTable($conn, $database, $sql_post, $imgColumns);
createTable($conn, $database, $sql_like, $likeColumns);
