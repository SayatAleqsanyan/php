<?php
require_once "tableCheck.php";

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
$sql_forum = "forum";
$sql_img = "db_img";
$sql_friends = "friend_requests";

require_once "databaseCheck.php"; // database ստուգում
// $conn - ով ենք կապ հաստատում

// Աղյուսակների սյունակները
$userColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'email' => 'VARCHAR(255) UNIQUE NOT NULL',
    'login' => 'VARCHAR(32) UNIQUE NOT NULL',
    'pass' => 'VARCHAR(32) NOT NULL'
];

$forumColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'user_id' => 'INT NOT NULL',
    'meseg' => 'TEXT NOT NULL COLLATE utf8mb3_general_ci',
    'time' => 'DATETIME DEFAULT CURRENT_TIMESTAMP'
];

$imgColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'name' => 'VARCHAR(255) NOT NULL COLLATE utf8mb4_0900_ai_ci',
    'user_id' => 'INT NOT NULL',
    'add_date' => 'DATETIME DEFAULT CURRENT_TIMESTAMP'
];

$friendsColumns = [
    'id' => 'INT AUTO_INCREMENT NOT NULL PRIMARY KEY',
    'from_id' => 'INT NOT NULL',
    'to_id' => 'INT NOT NULL',
    'status' => 'INT NOT NULL',
    'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP'
];


// Աղյուսակների ստեղծում (օգտագործելով ֆունկցիան)
createTable($conn, $database, $sql_users, $userColumns);
createTable($conn, $database, $sql_forum, $forumColumns);
createTable($conn, $database, $sql_img, $imgColumns);
createTable($conn, $database, $sql_friends, $friendsColumns);
