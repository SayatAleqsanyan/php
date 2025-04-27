<?php
$db = mysqli_connect("MySQL-8.2", "root","", "lesson_sql");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
}else{
//    echo "Connected successfully";
}