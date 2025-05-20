<?php
const SERVER_NAME = "MySQL-8.0";
const USER_NAME = "root";
const USER_PASSWORD = "";
const DB_NAME = "app_date";

$sql_db = "tests_db";

$conn = new mysqli(SERVER_NAME, USER_NAME, USER_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $sql_db";
$result = $conn->query($sql);


for($users = Array(); $row = $result->fetch_assoc(); $users[] = $row);
$conn->close();

if(isset($_POST['submit'])) {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    $conn = new mysqli(SERVER_NAME, USER_NAME, USER_PASSWORD, DB_NAME);

    $sql = "INSERT INTO $sql_db (name, age, email) VALUES ('$name', '$age', '$email')";
    $conn->query($sql);
    $conn->close();

    header("Location: /");
}

$name=$age=$email='';
if(isset($_GET['change'])) {
    $id = $_GET['change'];

    $name = $users[$id]['name'] ?? '';
    $age = $users[$id]['age'] ?? '';
    $email = $users[$id]['email'] ?? '';
    $id_bd = $users[$id]['id'] ?? '';
}

if(isset($_POST['edit'])) {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $email = $_POST['email'] ?? '';

    $conn = new mysqli(SERVER_NAME, USER_NAME, USER_PASSWORD, DB_NAME);

    $sql = "UPDATE $sql_db SET name = '$name', age = '$age', email = '$email' WHERE id = '$id_bd'";
    $conn->query($sql);
    $conn->close();

    header("Location: /");
}

if(isset($_POST['delete'])) {
    $conn = new mysqli(SERVER_NAME, USER_NAME, USER_PASSWORD, DB_NAME);

    $sql = "DELETE FROM $sql_db WHERE id = '$id_bd'";
    $conn->query($sql);
    $conn->close();

    header("Location: /");
}

if(isset($_POST['cancel'])) {
    header("Location: /");
}

?>

    <form action="" method="post">
        <input type="text" value="<?= $name; ?>" name="name" placeholder="Name"><br>
        <input type="number" value="<?= $age; ?>" name="age" placeholder="Age"><br>
        <input type="email" value="<?= $email; ?>" name="email" placeholder="Email"><br>

        <?php if(isset($_GET['change'])): ?>
            <input type="submit" value="Edit" name="edit">
            <input type="submit" value="Delete" name="delete">
            <input type="submit" value="Cancel" name="cancel"><br>
        <?php else: ?>
            <input type="submit" value="Submit" name="submit"><br>
        <?php endif; ?>
    </form>

<?php
foreach ($users as $key => $user) {
    echo "$user[id]. Name: $user[name], Age: $user[age], Email: $user[email] <a href='?change=$key'>Select</a><br>";
}








