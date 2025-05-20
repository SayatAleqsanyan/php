<?php
session_start();

require_once '../config/db.php';
global $db;



$json = file_get_contents('php://input');
$data = json_decode($json, true);
header('Content-Type: application/json');
$user_id = $data['user_id'];
$post_id = $data['id'];

$sql = "INSERT INTO likes (user_id, post_id) VALUES ($user_id, $post_id)";
$result = mysqli_query($db, $sql);


$sql1 = "SELECT COUNT(*) as count_like FROM likes WHERE post_id = $post_id";
$result1 = mysqli_query($db, $sql1);
$row = mysqli_fetch_assoc($result1);
if ($result1) {
    echo json_encode(["status" => "success", "data" => $row]);
}else{
    echo json_encode(["status" => "error"]);
}

exit;




//if ($data){
//    var_dump($data);
//}else{
//    echo "Invalid JSON";
//}
//die();