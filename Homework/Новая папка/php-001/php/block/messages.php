<?php
    require_once '../php/server/db.php';

$sql = "SELECT * FROM $sql_forum JOIN $sql_users ON $sql_users.id = $sql_forum.user_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($_SESSION['id'] == $row['user_id']) {
            echo "<div class='message-container my-container'><div class='message my-message'>
                    <div class='message-header'>
                        <span class='message-name'> " . htmlspecialchars($row['login']) . "</span>
                        <span class='message-time'> " . htmlspecialchars($row['time']) . "</span>
                    </div>
                    <div class='message-text'> " . htmlspecialchars($row['meseg']) . "</div>
                </div></div>";
        } else {
            echo "<div class='message-container'><div class='message'>
                    <div class='message-header'>
                        <span class='message-name'> " . htmlspecialchars($row['login']) . "</span>
                        <span class='message-time'> " . htmlspecialchars($row['time']) . "</span>
                    </div>
                    <div class='message-text'> " . htmlspecialchars($row['meseg']) . "</div>
                </div></div>";
        }
    }
}
?>

<div> </div>
