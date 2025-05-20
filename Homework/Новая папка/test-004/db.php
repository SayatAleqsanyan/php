<?php
// բազաըի հետ կապ
$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "app_date";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}


// կարգաորում
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


// տվյալների ստացում ֆռոնտից
$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? null;
$name = $input['name'] ?? null;


// պատասխան
if ($action != null){
    echo json_encode([
        'message' => 'success'
    ]);
    exit();
}














http_response_code(400);
echo json_encode(['message' => 'Finished']);

exit();