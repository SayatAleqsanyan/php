<?php
require_once '../includes/functions.php';

if (!isset($_SESSION['email'])) {
    header('Location: ../index.php');
    exit;
}

if (!checkSessionActivity()) {
    header('Location: ../action/action_logout.php');
    exit;
}

$email = $_SESSION['email'];
$user = $_SESSION['user'];
$login_time = $_SESSION['login_time'] ?? 'Անհայտ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Գլխավոր էջ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome-box {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .nav {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .logout {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<div class="welcome-box">
    <h1>Welcome, <?php echo htmlspecialchars($email); ?></h1>
    <p>Մուտքի ժամանակ: <?php echo htmlspecialchars($login_time); ?></p>
</div>

<div class="nav">
    <a href="profile.php" class="button">Անձնական էջ</a>
    <a href="../action/action_logout.php" class="button logout">Դուրս գալ</a>
</div>

<div class="content">
    <h2>Բարի գալուստ մեր կայք</h2>
    <p>Սա գլխավոր էջն է, որը տեսանելի է միայն մուտք գործած օգտվողների համար:</p>
</div>

<script>
  setTimeout(function() {
    alert('Ձեր սեսիան ավարտվել է: Խնդրում ենք նորից մուտք գործել');
    window.location.href = '../action/action_logout.php';
  }, 60000);
</script>
</body>
</html>
