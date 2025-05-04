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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Անձնական էջ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .profile-box {
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
        dl {
            display: grid;
            grid-template-columns: max-content auto;
            gap: 10px;
        }
        dt {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="profile-box">
    <h1>Անձնական էջ</h1>
</div>

<div class="nav">
    <a href="home.php" class="button">Գլխավոր էջ</a>
    <a href="../action/action_logout.php" class="button logout">Դուրս գալ</a>
</div>

<div class="content">
    <h2>Օգտվողի տվյալներ</h2>
    <dl>
        <dt>Էլ. հասցե:</dt>
        <dd><?php echo htmlspecialchars($email); ?></dd>

        <dt>Անուն:</dt>
        <dd><?php echo htmlspecialchars($user['firstname'] ?? 'Նշված չէ'); ?></dd>

        <dt>Ազգանուն:</dt>
        <dd><?php echo htmlspecialchars($user['lastname'] ?? 'Նշված չէ'); ?></dd>

        <dt>Ծննդյան ամսաթիվ:</dt>
        <dd><?php echo htmlspecialchars($user['birthdate'] ?? 'Նշված չէ'); ?></dd>

        <dt>Սեռ:</dt>
        <dd><?php echo htmlspecialchars($user['gender'] === 'male' ? 'Արական' : 'Իգական'); ?></dd>

        <dt>Լրացուցիչ տեղեկություն:</dt>
        <dd><?php echo htmlspecialchars($user['additional'] ?? 'Նշված չէ'); ?></dd>
    </dl>
</div>

<script>
  setTimeout(function() {
    alert('Ձեր սեսիան ավարտվել է: Խնդրում ենք նորից մուտք գործել');
    window.location.href = '../action/action_logout.php';
  }, 60000);
</script>
</body>
</html>