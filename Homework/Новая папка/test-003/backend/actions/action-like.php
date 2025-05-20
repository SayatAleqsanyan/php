<?php
session_start();
require_once './db.php';
$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';

$status = null;
if ($action === 'like-post') {
    $status = 1;
} elseif ( $action === 'dislike-post') {
    $status = 2;
} else {
    $status = 0;
}

$sql = "SELECT * FROM $sql_post_likes WHERE user_id = $input[user_id] AND post_id = $input[post_id]";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == $status) {
            $status = 0;
        }}

    $sql = "UPDATE $sql_post_likes SET status = $status  WHERE post_id = $input[post_id] AND user_id = $input[user_id]";
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }

    exit();
}

$sql = "INSERT INTO $sql_post_likes (`post_id`, `user_id`, `status`) 
        VALUES ($input[post_id], $input[user_id], $status)";

$result = $conn->query($sql);

if ($result) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}

exit();