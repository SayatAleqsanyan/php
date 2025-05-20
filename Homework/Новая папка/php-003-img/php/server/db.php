<?php
require_once "helped.php";

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

// Ստեղծում ենք կապ
$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
    die("Կապը չհաջողվեց: " . mysqli_connect_error());
}

// ▶ Ստուգում ենք բազայի գոյությունը
$sql_check_db = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$result = mysqli_query($conn, $sql_check_db);

if(mysqli_num_rows($result) == 0) {
    // Ստեղծում ենք բազան
    $sql_create_db = "CREATE DATABASE `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if(mysqli_query($conn, $sql_create_db)) {
        // echo "Տվյալների բազան ստեղծվեց\n";
    } else {
        die("Բազայի ստեղծման սխալ: " . mysqli_error($conn));
    }
} else {
    // echo "Տվյալների բազան արդեն գոյություն ունի\n";
}

// ▶ Ընտրում ենք բազան
mysqli_select_db($conn, $database);

// Կապի ստեղծում
mysqli_set_charset($conn, 'utf8mb4');

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

// Աղյուսակների ստեղծում (օգտագործելով ֆունկցիան)
createTable($conn, $database, $sql_users, $userColumns);
createTable($conn, $database, $sql_forum, $forumColumns);
createTable($conn, $database, $sql_img, $imgColumns);





