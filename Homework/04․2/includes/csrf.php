<?php
require_once 'functions.php';

// CSRF թոքենի ստեղծում
function csrf_token() {
    return generateCSRFToken();
}

// CSRF input field-ի ստեղծում
function csrf_field() {
    $token = csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . $token . '">';
}

// CSRF թոքենի ստուգում
function csrf_verify() {
    if (!isset($_POST['csrf_token'])) {
        return false;
    }

    return verifyCSRFToken($_POST['csrf_token']);
}
?>