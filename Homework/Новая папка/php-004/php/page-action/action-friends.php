<?php
session_start();

require_once '../php/server/db.php';

// Ուղարկել հարցում
function sendRequest($conn, $from_id, $to_id) {
    $check_sql = "SELECT * FROM friend_requests WHERE from_id = $from_id AND to_id = $to_id AND status NOT IN (0)";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
         echo "<h4 style='margin-left: 150px'>Դուք արդեն ուղարկել եք ընկերության հարցում։<h4>";
        return;
    }

    // Եթե չկա, ուղարկում ենք հարցում
    $sql = "INSERT INTO friend_requests (from_id, to_id, status) VALUES ($from_id, $to_id, 2)";
    if (mysqli_query($conn, $sql)) {
         echo "<h4 style='margin-left: 150px'>Հարցումը ուղարկվեց։ $from_id -> $to_id </h4>";
    } else {
        echo "<h4 style='margin-left: 150px'>Սխալ հարցում ուղարկելու ժամանակ։ $from_id -> $to_id </h4>";
    }
}

// Ընդունել հարցում
function acceptRequest($conn, $request_id) {
    $sql = "UPDATE friend_requests SET status = 1 WHERE to_id = '$_SESSION[id]' AND from_id = $request_id";
    mysqli_query($conn, $sql);
    echo "<h4 style='margin-left: 150px'>Հարցումը ուղարկվեց։ $_SESSION[id] ->  $request_id </h4>";

}

// Մերժել հարցում
function rejectRequest($conn, $request_id) {
    $sql = "UPDATE friend_requests SET status = 0 
            WHERE to_id = '$_SESSION[id]' AND from_id = $request_id 
            OR from_id = '$_SESSION[id]' AND to_id = $request_id";
    mysqli_query($conn, $sql);
    echo "<h4 style='margin-left: 150px'>Հարցումը ուղարկվեց։ $_SESSION[id] ->  $request_id </h4>";

}

// Ստանալ ինձ ուղարկված հարցումները
function getReceivedRequests($conn, $my_id) {
    // $sql = "SELECT * FROM friend_requests WHERE to_id = $my_id AND status = 2";
    $sql = "
        SELECT * FROM test_users 
        WHERE id != $my_id AND id IN (
            SELECT from_id FROM friend_requests WHERE to_id = $my_id AND status = 2
        )
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Ստանալ ում եմ ուղարկել հարցում
function getSentRequests($conn, $my_id) {
    // $sql = "SELECT * FROM friend_requests WHERE from_id = $my_id AND status = 2";
    $sql = "
        SELECT * FROM test_users 
        WHERE id != $my_id AND id IN (
            SELECT to_id FROM friend_requests WHERE from_id = $my_id AND status = 2
        )
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Ստանալ բոլոր օգտատերերին, րոնց հետ կապ չունեմ (ոչ հարցում կա, ոչ ընդունված)
function getUnrelatedUsers($conn, $my_id) {
    $sql = "
        SELECT * FROM test_users 
        WHERE id != $my_id AND id NOT IN (
            SELECT to_id FROM friend_requests WHERE from_id = $my_id AND status IN (1,2)
            UNION
            SELECT from_id FROM friend_requests WHERE to_id = $my_id AND status IN (1,2)
        )
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Ստանալ բոլոր ընկերներին
function getUnrelatedFriends($conn, $my_id) {
    $sql = "
        SELECT * FROM test_users 
        WHERE id != $my_id AND id IN (
            SELECT to_id FROM friend_requests WHERE from_id = $my_id AND status = 1
            UNION
            SELECT from_id FROM friend_requests WHERE to_id = $my_id AND status = 1
        )
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
