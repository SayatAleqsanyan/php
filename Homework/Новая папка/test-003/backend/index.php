<?php
$input = json_decode(file_get_contents('php://input'), true);

$action = $input['action'] ?? '';

if ($action === 'login') {
    require_once 'actions/action-login.php';
}

if ($action === 'register') {
    require_once 'actions/action-registration.php';
    exit;
}

if ($action === 'logout') {
    require_once 'actions/action-logout.php';
}

if ($action === 'get-posts' || $action === 'add-post' || $action === 'edit-post' || $action === 'delete-post') {
    require_once 'actions/action-posts.php';
}

if ($action === 'like-post' || $action === 'dislike-post') {
    require_once 'actions/action-like.php';
}

http_response_code(400);
echo json_encode(['message' => 'invalid request']);
