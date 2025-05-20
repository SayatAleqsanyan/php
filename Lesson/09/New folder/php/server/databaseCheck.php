<?php

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
mysqli_set_charset($conn, 'utf8');