<?php
$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "app_date";

$sql_users = "test_users";
$sql_posts = "posts";
$sql_post_likes = "post_like";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}


