<?php
require_once 'functions.php';

function csrf_token() {
    return generateCSRFToken();
}

function csrf_field() {
    $token = csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . $token . '">';
}

function csrf_verify() {
    if (!isset($_POST['csrf_token'])) {
        return false;
    }

    return verifyCSRFToken($_POST['csrf_token']);
}
?>