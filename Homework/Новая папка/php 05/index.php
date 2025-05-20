<?php
require_once 'includes/functions.php';

if (isset($_SESSION['email'])) {
    header('Location: pages/home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Մուտք և գրանցում</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .login-section, .register-section {
            flex: 1;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
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
    </style>
</head>
<body>
<h1>Բարի գալուստ</h1>

<div class="container">
    <div class="login-section">
        <h2>Մուտք</h2>
        <?php include 'blocks/login_form.php'; ?>
    </div>

    <div class="register-section">
        <h2>Գրանցում</h2>
        <?php include 'blocks/register_form.php'; ?>
    </div>
</div>
</body>
</html>