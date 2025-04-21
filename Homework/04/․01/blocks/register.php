<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
?>

<form action="action/action_register.php" method="post" style="display: flex; flex-direction: column; align-items: start">
    <input type="text" name="First_Name" placeholder="First Name">
    <input type="text" name="Last_Name" placeholder="Last Name">
    <input type="date" name="Date_of_Birth" placeholder="Date of Birth">
    <input type="text" name="Country" placeholder="Country">
    <label> Gender:
        <label > <input type="radio" name="gender" value="male"> Male</label>
        <label > <input type="radio" name="gender" value="female"> Female </label>
    </label>

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login">
</form>
