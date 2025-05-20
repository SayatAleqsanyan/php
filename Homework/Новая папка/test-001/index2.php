<?php
$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "app_date";
$sql_db = "tests_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $age = $email = '';
$id_db = null;

// ----- Add New -------------------------------------------------
if (isset($_POST['Add_New'])) {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    $sql = "INSERT INTO $sql_db (name, age, email) VALUES ('$name', '$age', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully<br>";
        $name = $age = $email = '';
    } else {
        echo "Error: " . mysqli_error($conn) . "<br>";
    }
}

// ----- Delete -------------------------------------------------
if (isset($_POST['delete'])) {
    $id = (int)$_POST['id'];
    $delete_sql = "DELETE FROM $sql_db WHERE id = $id";
    mysqli_query($conn, $delete_sql);
}

// ----- Get One For Update Form --------------------------------
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $sql = "SELECT * FROM $sql_db WHERE id = $id";
    $res_single = mysqli_query($conn, $sql);

    if ($res_single && mysqli_num_rows($res_single) > 0) {
        $row = mysqli_fetch_assoc($res_single);
        $name = $row['name'];
        $age = $row['age'];
        $email = $row['email'];
        $id_db = $row['id'];
    }
}

// ----- Apply Update -------------------------------------------
if (isset($_POST['apply_update'])) {
    $id = (int)$_POST['id'];
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    $update_sql = "UPDATE $sql_db SET name='$name', age='$age', email='$email' WHERE id=$id";
    mysqli_query($conn, $update_sql);

    $name = $age = $email = '';
    $id_db = null;
}

// ----- Get All and Sort ---------------------------------------
$field = $_POST['sort_field'] ?? 'id';
$order = $_POST['sort_order'] ?? 'ASC';

$allowed_fields = ['name', 'age', 'email', 'id'];
$allowed_order = ['ASC', 'DESC'];

$field = in_array($field, $allowed_fields) ? $field : 'id';
$order = in_array($order, $allowed_order) ? $order : 'ASC';

$sql = "SELECT * FROM $sql_db ORDER BY $field $order";
$res = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Project</title>
</head>
<body>
<h1>Test Project</h1>

<!-- Sort Form -->
<form action="" method="post" id="sortForm">
    <select name="sort_field" onchange="document.getElementById('sortForm').submit();">
        <option value="id" <?= ($field == 'id') ? 'selected' : '' ?>>Default</option>
        <option value="name" <?= ($field == 'name') ? 'selected' : '' ?>>Name</option>
        <option value="age" <?= ($field == 'age') ? 'selected' : '' ?>>Age</option>
        <option value="email" <?= ($field == 'email') ? 'selected' : '' ?>>Email</option>
    </select>

    <select name="sort_order" onchange="document.getElementById('sortForm').submit();">
        <option value="ASC" <?= ($order == 'ASC') ? 'selected' : '' ?>>Ascending</option>
        <option value="DESC" <?= ($order == 'DESC') ? 'selected' : '' ?>>Descending</option>
    </select>
</form>

<!-- Table -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php if ($res && mysqli_num_rows($res) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <tr>
                <form method="post">
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['age']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <td><input type="submit" name="update" value="Update"></td>
                    <td><input type="submit" name="delete" value="Delete"></td>
                </form>
            </tr>
        <?php endwhile; ?>
    <?php endif; ?>
</table>

<!-- Add / Update Form -->
<h3><?= $id_db ? "Update Record (ID: $id_db)" : "Add New Record" ?></h3>
<form method="post">
    <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($name) ?>"><br>
    <input type="number" name="age" placeholder="Age" value="<?= htmlspecialchars($age) ?>"><br>
    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>"><br>
    <?php if ($id_db): ?>
        <input type="hidden" name="id" value="<?= $id_db ?>">
        <input type="submit" name="apply_update" value="Apply Update">
    <?php else: ?>
        <input type="submit" name="Add_New" value="Submit">
    <?php endif; ?>
</form>
</body>
</html>
