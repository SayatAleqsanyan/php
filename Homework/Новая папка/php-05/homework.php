<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

// 1. Ստեղծիր նոր PHP ֆայլ, որը միանում է տվյալների բազային։
echo "<h1>Տվյալների բազայի միացում</h1>";
$db = getDbConnection();
echo "<p>Տվյալների բազայի հետ կապը հաջող է հաստատվել։</p>";

// 2. Ստուգիր, արդյոք տվյալների բազայի կապը հաջող է հաստատվել, և տպիր համապատասխան հաղորդագրություն։
echo "<h1>Տվյալների բազայի կապի ստուգում</h1>";
if ($db) {
    echo "<p>Տվյալների բազայի կապը հաջող է հաստատվել։</p>";
} else {
    echo "<p>Տվյալների բազայի կապը ձախողվել է։</p>";
}

// 3. Տվյալների բազայում ստեղծիր users աղյուսակը, եթե այն դեռ չկա։ Օգտագործիր SQL CREATE TABLE հրամանը։
echo "<h1>Օգտատերերի աղյուսակի ստեղծում</h1>";
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    birthdate DATE,
    additional TEXT,
    gender ENUM('male', 'female'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($db, $sql)) {
    echo "<p>Օգտատերերի աղյուսակը հաջողությամբ ստեղծված է կամ արդեն գոյություն ունի։</p>";
} else {
    echo "<p>Սխալ է տեղի ունեցել օգտատերերի աղյուսակը ստեղծելիս: " . mysqli_error($db) . "</p>";
}

// 4. Տվյալների բազայից ընտրիր բոլոր օգտատերերին և տպիր նրանց անունները։
echo "<h1>Բոլոր օգտատերերի անունները</h1>";
$sql = "SELECT firstname, lastname FROM users";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Օգտատերեր չեն գտնվել։</p>";
}

// 5. Տպիր միայն այն օգտատերերի էլ. հասցեները, որոնց անունը սկսվում է "H" տառով։
echo "<h1>Օգտատերերի էլ. հասցեները, որոնց անունը սկսվում է \"H\" տառով</h1>";
$sql = "SELECT email, firstname FROM users WHERE firstname LIKE 'H%'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row['email']) . " (" . htmlspecialchars($row['firstname']) . ")</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Այդպիսի օգտատերեր չեն գտնվել։</p>";
}

// 6. Տվյալների բազայում ավելացրու նոր օգտատեր, որի անունը և էլ. հասցեն դու ինքդ կգրես։
echo "<h1>Նոր օգտատիրոջ ավելացում</h1>";

$new_email = "test_user@example.com";
$sql = "SELECT COUNT(*) as count FROM users WHERE email = '$new_email'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['count'] == 0) {
    $new_password = password_hash("Test1234", PASSWORD_BCRYPT);
    $new_firstname = "Test";
    $new_lastname = "User";
    $new_birthdate = "2000-01-01";
    $new_gender = "male";

    $sql = "INSERT INTO users (email, password, firstname, lastname, birthdate, gender) 
            VALUES ('$new_email', '$new_password', '$new_firstname', '$new_lastname', '$new_birthdate', '$new_gender')";

    if (mysqli_query($db, $sql)) {
        echo "<p>Նոր օգտատերը հաջողությամբ ավելացվել է։</p>";
    } else {
        echo "<p>Սխալ է տեղի ունեցել նոր օգտատեր ավելացնելիս: " . mysqli_error($db) . "</p>";
    }
} else {
    echo "<p>Այդ էլ. հասցեով օգտատեր արդեն գոյություն ունի։</p>";
}

// 7. Ստեղծիր ֆորմա HTML-ում, որը թույլ կտա օգտատիրոջը մուտքագրել անուն և էլ. հասցե։ Արդյունքը ավելացրու բազա։
echo "<h1>Նոր օգտատիրոջ ավելացման ֆորմա</h1>";
?>

    <form action="process_new_user.php" method="post">
        <div>
            <label for="email">Էլ. հասցե:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="firstname">Անուն:</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div>
            <label for="lastname">Ազգանուն:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div>
            <label for="password">Գաղտնաբառ:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="birthdate">Ծննդյան ամսաթիվ:</label>
            <input type="date" id="birthdate" name="birthdate" required>
        </div>
        <div>
            <label>Սեռ:</label>
            <label><input type="radio" name="gender" value="male" required> Արական</label>
            <label><input type="radio" name="gender" value="female"> Իգական</label>
        </div>
        <div>
            <label for="additional">Լրացուցիչ տեղեկություն:</label>
            <textarea id="additional" name="additional"></textarea>
        </div>
        <button type="submit">Ավելացնել</button>
    </form>

<?php

// 8․ Համոզվիր, որ նոր օգտատերը չի կրկնվում նախքան բազա ավելացնելը։
// Ստուգվում է գրանցման ժամանակ

// 9. Տպիր օգտատերերի քանակը users աղյուսակից։
echo "<h1>Օգտատերերի քանակը</h1>";
$sql = "SELECT COUNT(*) as count FROM users";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
echo "<p>Օգտատերերի ընդհանուր քանակը: " . $row['count'] . "</p>";

// 10. Փոխիր որոշակի օգտատիրոջ անունը ըստ էլ. հասցեի։
echo "<h1>Օգտատիրոջ անվան փոփոխում</h1>";
$email_to_update = "test_user@example.com";
$new_firstname = "Updated";
$new_lastname = "User";

$sql = "UPDATE users SET firstname = '$new_firstname', lastname = '$new_lastname' WHERE email = '$email_to_update'";

if (mysqli_query($db, $sql)) {
    echo "<p>Օգտատիրոջ անունը հաջողությամբ փոփոխվել է։</p>";
} else {
    echo "<p>Սխալ է տեղի ունեցել օգտատիրոջ անունը փոփոխելիս: " . mysqli_error($db) . "</p>";
}

mysqli_close($db);
?>