<?php
session_start();

require '../php/page-action/action-friends.php';

$title = "Images Page";
require_once '../php/block/header.php';
require_once '../php/block/menu.php';

$all_users = getUnrelatedUsers($conn, $_SESSION['id']);
$from_users = getReceivedRequests($conn, $_SESSION['id']);
$to_users = getSentRequests($conn, $_SESSION['id']);
$friends = getUnrelatedFriends($conn, $_SESSION['id']);

$action = $_POST['action'] ?? '';
switch ($action) {
    case 'send':
        sendRequest($conn, $_POST['from_id'], $_POST['to_id']);
        break;
    case 'accept':
        acceptRequest($conn, $_POST['to_id']);
        break;
    case 'reject':
        rejectRequest($conn, $_POST['to_id']);
        break;
}
?>

<section>
    <div class="allUserBlock">
        <?php
        $card_title = "Ask Me";
        $users = $from_users;
        require '../php/block/cards.php'?>

        <?php
        $card_title = "My Requests";
        $users = $to_users;
        require '../php/block/cards.php'?>

        <?php
        $card_title = "Friends";
        $users = $friends;
        require '../php/block/cards.php'?>

        <?php
        $card_title = "Other Users";
        $users = $all_users;
        require '../php/block/cards.php'?>
    </div>
</section>
</body>
</html>