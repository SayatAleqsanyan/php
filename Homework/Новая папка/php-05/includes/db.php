<?php
function getDbConnection() {
    $db = mysqli_connect("MySQL-8.4", "root", "", "users");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_set_charset($db, "utf8mb4");

    return $db;
}

function createUsersTableIfNotExists() {
    $db = getDbConnection();

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        firstname VARCHAR(255),
        lastname VARCHAR(255),
        birthdate DATE,
        additional TEXT,
        gender ENUM('male', 'female'),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!mysqli_query($db, $sql)) {
        die("Error creating table: " . mysqli_error($db));
    }

    mysqli_close($db);
}

createUsersTableIfNotExists();
?>
