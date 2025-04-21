<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>

<form action="action/action_register.php" method="post">
    <input type="text" name="First_Name" placeholder="First Name" required><br>
    <input type="text" name="Last_Name" placeholder="Last Name" required><br>
    <input type="date" name="Date_of_Birth" required><br>
    <input type="text" name="Country" placeholder="Country" required><br>

    <label> Gender:
        <label><input type="radio" name="gender" value="male" required> Male</label>
        <label><input type="radio" name="gender" value="female"> Female</label>
    </label><br>

    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="login" value="Register"><br>
</form>
