<?php
session_start();
require_once __DIR__ . '/db.php';

function validatePassword($password) {
    return preg_match('/^[A-Z].*\d/', $password) && strlen($password) >= 8;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkSessionActivity() {
    if (!isset($_SESSION['last_activity'])) {
        $_SESSION['last_activity'] = time();
        return true;
    }

    if (time() - $_SESSION['last_activity'] > 30) {
        session_unset();
        session_destroy();
        return false;
    }

    $_SESSION['last_activity'] = time();
    return true;
}

function logError($message) {
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[$timestamp] $message\n";
    error_log($log_message, 3, __DIR__ . '/../data/log.txt');
}

function getUsersFromDatabase() {
    $db = getDbConnection();
    $users = [];

    $query = "SELECT * FROM users";
    $result = mysqli_query($db, $query);

    if ($result) {
        while ($user = mysqli_fetch_assoc($result)) {
            $email = $user['email'];
            $users[$email] = $user;
        }
    }

    mysqli_close($db);
    return $users;
}

function getUserByEmail($email) {
    $db = getDbConnection();

    $stmt = mysqli_prepare($db, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    return $user;
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

function authenticateUser($email, $password) {
    $user = getUserByEmail($email);

    if ($user && verifyPassword($password, $user['password'])) {
        return $user;
    }

    return false;
}

function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $token) {
        return false;
    }
    return true;
}

function addUserToDatabase($email, $password_hash, $firstname, $lastname, $birthdate, $additional, $gender) {
    $db = getDbConnection();

    $stmt = mysqli_prepare($db, "INSERT INTO users (email, password, firstname, lastname, birthdate, additional, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssss", $email, $password_hash, $firstname, $lastname, $birthdate, $additional, $gender);

    $success = mysqli_stmt_execute($stmt);

    if (!$success) {
        logError("Failed to add user to database: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    return $success;
}

function emailExists($email) {
    $db = getDbConnection();

    $stmt = mysqli_prepare($db, "SELECT COUNT(*) as count FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    return $row['count'] > 0;
}

function getAllUsers() {
    $db = getDbConnection();
    $users = [];

    $result = mysqli_query($db, "SELECT * FROM users");

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    mysqli_close($db);
    return $users;
}

function getUsersCount() {
    $db = getDbConnection();

    $result = mysqli_query($db, "SELECT COUNT(*) as count FROM users");
    $row = mysqli_fetch_assoc($result);

    mysqli_close($db);

    return $row['count'];
}

function updateUserName($email, $firstname, $lastname) {
    $db = getDbConnection();

    $stmt = mysqli_prepare($db, "UPDATE users SET firstname = ?, lastname = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    return $success;
}

function getUsersWithNameStartingWith($letter) {
    $db = getDbConnection();
    $users = [];

    $pattern = $letter . '%';
    $stmt = mysqli_prepare($db, "SELECT * FROM users WHERE firstname LIKE ?");
    mysqli_stmt_bind_param($stmt, "s", $pattern);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    return $users;
}
?>