<?php
session_start();
session_unset();
session_destroy();
setcookie("token", "", time() - 3600, "/");
echo json_encode(['message' => 'success']);
exit();
