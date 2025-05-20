<?php

session_start();
require_once './db.php';

$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';
$user_id = $input['user_id'] ?? '';
$post_id = $input['post_id'] ?? '';
$title = $input['title'] ?? '';
$body = $input['body'] ?? '';

// --------------------- get posts ---------------------
if ($action === 'get-posts') {
//    $sql = "SELECT $sql_posts.* , $sql_users.login
//        FROM $sql_posts
//        JOIN $sql_users
//        ON $sql_posts.user_id = $sql_users.id";
//
//    $result = $conn->query($sql);
//
//    if ($result && $result->num_rows > 0) {
//        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
//        echo json_encode($data);
//    } else {
//        echo json_encode(['message' => 'Posts not found']);
//    }

    // SQL запрос для получения всех постов с пользователями и статусами (лайк/дизлайк)
    $sql = "SELECT posts.id AS post_id, 
                   posts.user_id AS post_user_id, 
                   posts.post_add_date, 
                   posts.post_title, 
                   posts.post_body, 
                   posts.img_id, 
                   COALESCE(likes.status, 0) AS user_status
            FROM posts
            JOIN test_users AS users ON posts.user_id = users.id
            LEFT JOIN post_like AS likes ON posts.id = likes.post_id AND likes.user_id = $user_id";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            // Return status of like or dislike (1 for like, 2 for dislike, 0 for no reaction)
            $row['additional_data'] = $row['user_status']; // 0 = no like/dislike, 1 = like, 2 = dislike
            $posts[] = $row;
        }

        echo json_encode($posts);
    } else {
        echo json_encode(['message' => 'Posts not found']);
    }
    exit();
}

// --------------------- add post ---------------------
if ($action === 'add-post'){
    $sql = "INSERT INTO $sql_posts (user_id, post_title, post_body) VALUES ($user_id, '$title', '$body')";
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['message' => 'success']);
    } else {
        echo json_encode(['message' => 'error']);
    }
    exit();
}

// --------------------- edit post ---------------------
if ($action === 'edit-post'){
    $sql = "UPDATE $sql_posts SET post_title = '$title', post_body = '$body' WHERE user_id = $user_id AND id = $post_id";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['message' => 'success']);
    } else {
        echo json_encode(['message' => 'error']);
    }
    exit();
}

// --------------------- delete post ---------------------
if ($action === 'delete-post'){
    $sql = "DELETE FROM $sql_posts WHERE user_id = $user_id AND id = $post_id";
    $result = $conn->query($sql);
    if ($result) {
        echo json_encode([
            'message' => 'success',
        ]);
    } else {
        echo json_encode([
            'message' => 'error',
        ]);
    }
    exit();
}