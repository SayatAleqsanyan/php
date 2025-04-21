<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['First_Name'] . " " . $_SESSION['Last_Name']; ?>!</h2>
<p>Email: <?php echo $_SESSION['email']; ?></p>
<p>Birthday: <?php echo $_SESSION['Date_of_Birth']; ?></p>
<p>Country: <?php echo $_SESSION['Country']; ?></p>
<p>Gender: <?php echo $_SESSION['gender']; ?></p>

<a href="../action/action_logout.php">Logout</a>
