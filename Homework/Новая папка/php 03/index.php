<?php
echo '<a href="index.php">📝 Տնային</a> <a href="index3.php">🧪 Լրացուցիչ</a><br><br>';

echo '📝 Տնային առաջադրանքներ (16–30)<br><br>';

echo '<a href="index.php">🧠 Array-ների</a> <a href="index2.php">🧠 String-երի</a><br><br>';
echo '🧠 Array-ների առաջադրանքներ (1–15)<br><br>';

echo '1. Ստեղծիր զանգված՝ պահելով քո ընտանիքի անդամների անունները։ Տպիր ամեն անուն նոր տողի վրա։<br><br>';

$family = ['Գագիկ', 'Մելանյա', 'Սայաթ', 'Վալոդյա', 'Քնար', 'Արսեն'];
foreach ($family as $value) {
    echo $value . '<br>';
}

echo '<br>2. Ստեղծիր զանգված 5 թվով։ Յուրաքանչյուր թվին ավելացրու 10։<br><br>';

$nums = [15, 25, 35, 45, 55];
echo 'Original array: ';
foreach ($nums as $key => $value) {
    echo $value . ', ';
    $nums[$key] = $value + 10;
}

echo '<br> Modified array: ';

foreach ($nums as $value) {
    echo $value . ', ';
}

echo '<br><br> 3. Ստեղծիր ասոցիատիվ զանգված՝ պահելով անձանց անուններն ու տարիքը։ Տպիր միայն նրանց անունները, ովքեր 18-ից մեծ են։<br><br>';

$array = [
    'Jon' => 19,
    'Alice' => 17,
    'Mary' => 16,
    'Bob' => 21,
];

echo 'նրանց անունները, ովքեր 18-ից մեծ են։ ';
foreach ($array as $name => $age) {
    if ($age > 18) {
        echo $name . ', ';
    }
}

echo '<br><br> 4. Ստեղծիր 2 զանգված՝ անուններով և գնահատականներով։ Փորձիր դրանք միավորել ասոցիատիվ զանգվածի։<br><br>';

$names = ['Jon', 'Alice', 'Mary', 'Bob'];
$grades = [15, 17, 11, 19];
echo 'ասոցիատիվ զանգված։ ';
$students = []; // array_combine($names, $grades);
foreach ($names as $key => $name) {
    $students[$name] = $grades[$key];
    echo ' ' . $name . ' => ' . $grades[$key] . ',';
}

echo '<br><br>5. Ստեղծիր զանգված, որտեղ 10 տարր կլինեն, դրանցից միայն զույգ թվերը տպիր։<br><br>';

$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo '1 - 10 թվերի միայն զույգ թվերը։ ';
foreach ($nums as $value) {
    if ($value % 2 == 0) {
        echo " $value,";
    }
}

echo '<br><br>6. Գեներացրու զանգված՝ 1-ից 100 ամբողջ թվերով։ Հաշվիր նրանց քանակը, որոնք բազմապատիկ են 7-ի։<br><br>';

$nums = [];
$nums2 = [];
for ($i = 1; $i <= 100; $i++) {
    $nums[] = $i;
}

foreach ($nums as $value) {
    if ($value % 7 == 0) {
        $nums2[] = $value;
    }
}

echo 'նրանց քանակը, որոնք բազմապատիկ են 7-ի։ ' . count($nums2) . '<br><br>';

echo '7. Ստեղծիր բազմաչափ զանգված՝ ուսանողներ և նրանց դասընթացները։ Տպիր յուրաքանչյուր ուսանողի անունը և իր անցած դասընթացները։<br><br>';

$students = [
  'Bob' => [
      'HTML' => true,
      'CSS' => false,
      'JS' => false,
      'PHP' => true,
      'MySQL' => true
  ],
  'Alice' => [
      'HTML' => true,
      'CSS' => true,
      'JS' => false,
      'PHP' => true,
      'MySQL' => true
  ],
  'John' => [
      'HTML' => true,
      'CSS' => true,
      'PHP' => false,
      'MySQL' => false
  ],
  'Maria' => [
      'HTML' => true,
      'CSS' => true,
      'JS' => true,
      'React' => true,
      'NextJS' => false
  ],
];

foreach ($students as $name => $courses) {
    echo "անունը: $name, անցած դասընթացները: ";
    foreach ($courses as $course => $status) {
        if ($status) {
            echo "$course, ";
        }
    }
    echo '<br>';
}

echo '<br>8. Ստեղծիր զանգված՝ որտեղ կլինեն բառեր։ Տպիր միայն այն բառերը, որոնց երկարությունը 5-ից ավելի է։<br><br>';

$strs = ['Ստեղծիր', 'զանգված', 'որտեղ', 'կլինեն', 'բառեր', 'Տպիր', 'միայն', 'այն', 'բառերը', 'որոնց', 'երկարությունը', '5-ից', 'ավելի', 'է'];

echo 'բառերը, որոնց երկարությունը 5-ից ավելի է: ';
foreach ($strs as $str) {
    if (mb_strlen($str) > 5) {
        echo $str . ', ';
    }
}

echo '<br><br>9. Ստեղծիր զանգված, հետո մի քանի տարր ջնջիր unset() ֆունկցիայով։ Տպիր արդյունքը։<br><br>';

$arr = ['Ստեղծիր', 'զանգված', 'հետո', 'մի', 'քանի', 'տարր', 'ջնջիր', 'unset()', 'ֆունկցիայով', 'Տպիր', 'արդյունքը'];

unset($arr[2]);
unset($arr[3]);
unset($arr[4]);
unset($arr[5]);
unset($arr[6]);
unset($arr[7]);

echo 'արդյունքը: <pre>';
print_r($arr);
echo '</pre> <br>';

echo '10. Ստեղծիր զանգված և ավելացրու տվյալ տարրը վերջում (array_push) և սկզբում (array_unshift)։<br><br>';

$arr = ['Ստեղծիր', 'զանգված', 'հետո'];
array_push($arr, 'array_push');
array_unshift($arr, 'array_unshift');

echo 'արդյունքը: <pre>';
print_r($arr);
echo '</pre> <br>';

echo '11. Ստեղծիր 2 զանգված և միացրու դրանք array_merge-ով։<br><br>';

$a = ["խնձոր", "տանձ"];
$b = ["բանան", "սերկևիլ"];

$result = array_merge($a, $b);

echo 'արդյունքը: <pre>';
print_r($result);
echo '</pre> <br>';

echo '12. Ստեղծիր ասոցիատիվ զանգված՝ որտեղ բանալիներն են մրգերի անուններ, իսկ արժեքները՝ գները։ Տպիր բոլոր բանալիները։<br><br>';

$fruits = [
    "խնձոր" => 500,
    "տանձ" => 1400,
    "բանան" => 750,
    "սերկևիլ" => 950
];

foreach ($fruits as $key => $value) {
    echo $key . ', ';
}

echo '<br><br>13. Սորտավորի զանգվածը ըստ արժեքների՝ մեծից փոքր։<br><br>';

//arsort($fruits);
uasort($fruits, function($a, $b) {
    return $b <=> $a;
});

echo 'արդյունքը: <pre>';
print_r($fruits);
echo '</pre> <br>';

echo '14. Ստեղծիր զանգված և reverse արա այն՝ array_reverse()։<br><br>';

$reversed = array_reverse($fruits);
echo 'արդյունքը: <pre>';
print_r($reversed);
echo '</pre> <br>';

echo '15. Ստեղծիր զանգված և ստուգիր՝ արդյոք մի արժեք կա թե ոչ array_search-ով։<br><br>';

$fruits2 = ["խնձոր", "տանձ", "բանան", "սերկևիլ"];
$res = array_search('խնձոր', $fruits2);
if ($res === false) {
    echo 'array_search-ով արժեքը չի գտնվել<br><br>';
} else {
    echo 'array_search-ով արժեքը գտնվել է<br><br>';
}

