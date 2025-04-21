<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
?>

<form action="action/action_login.php" method="post" style="display: flex; flex-direction: column; align-items: start">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login">
</form>
