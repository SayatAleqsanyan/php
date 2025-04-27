<?php
require_once '../includes/functions.php';

// Ջնջում ենք սեսիայի փոփոխականները
session_unset();

// Ավարտում ենք սեսիան
session_destroy();

// Վերուղղորդում ենք հիմնական էջ
header('Location: ../index.php');
exit;
?>