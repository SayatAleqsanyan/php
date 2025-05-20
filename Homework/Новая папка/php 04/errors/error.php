<?php
$error_message = $_GET['message'] ?? 'Սխալ է տեղի ունեցել';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Սխալ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .error-box {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
            padding: 20px;
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
    </style>
</head>
<body>
<div class="error-box">
    <h1>Սխալ</h1>
    <p><?php echo htmlspecialchars($error_message); ?></p>
</div>

<div>
    <a href="../index.php" class="button">Վերադառնալ գլխավոր էջ</a>
</div>
</body>
</html>