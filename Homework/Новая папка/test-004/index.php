<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php + mySql</title>
</head>
<body>

<?php
$mysql = new mysqli('MySQL-8.0', 'root', '', 'app_date');
$mysql->query("SET NAMES 'utf8'");

if($mysql->connect_errno) {
    echo $mysql->connect_error;
    exit();
}


// ստեղծել աղյուսակ
//$mysql->query("CREATE TABLE `test_table` (
//    id INT(11) NOT NULL,
//    name VARCHAR(255) NOT NULL,
//    bio TEXT NOT NULL,
//    PRIMARY KEY (id)
//)");


// ավելացնել աղյուսակում տվյալներ
//for ($i = 1; $i < 10; $i++) {
//    $mysql->query("INSERT INTO `test_table` (`name`, `bio`) VALUES ('test{$i}', 'text{$i}...')");
//}


// կատարել փոփոխություն // եթե պայման չնշվի բոլորի մոտ տեղի կունենա փոփոխությունը
// $mysql->query("UPDATE `test_table` SET `name` = 'test', `bio` = 'text...' WHERE `id` = 12");


// ջնջել // եթե պայման չնշվի բոլորը կջնջվեն
// $mysql->query("DELETE FROM `test_table` WHERE `id` = 15");


// ստանալ տվյալներ և տպել
$result = $mysql->query("SELECT * FROM `test_table`");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'id: ' . $row['id'] . ', name: ' . $row['name'] . ', bio: ' . $row['bio'] . '<br>';
    }
}




$mysql->close();
?>

</body>
</html>
