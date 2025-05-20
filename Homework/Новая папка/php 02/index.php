<?php
echo '🔁 Ցիկլեր (Loops) <br><br>';
echo '1. Տպիր 1-ից 100 թվերը, բայց միայն կենտերը՝ օգտագործելով while loop։ <br><br>';
$i = 1;
echo '1-ից 100 կենտ թվերը: ';
while ($i <= 100) {
    if ($i % 2 == 1) { // կենտ | $i % 2 == 0 // զույգ
        echo $i . ' ';
    }
    $i++;
}

echo '<br><br> 2. Օգտագործիր for loop և հաշվիր 1-ից 10 թվերի գումարը։ <br><br>';

$res = 0;
for ($i = 1; $i <= 10; $i++) {
    $res += $i;
}
echo '1-ից 10 թվերի գումարը: ' . $res;

echo '<br><br> 3. do...while ցիկլով տպիր «Բարև աշխարհ» 5 անգամ։ <br><br>';

$i = 0;
do {
    echo $i + 1 . '. «Բարև աշխարհ» <br>';
    $i++;
} while ($i < 5);

echo '<br>4. Տվյալ զանգվածի մեջից տպիր միայն զույգ թվերը։ $arr = [1, 4, 7, 8, 10, 15] <br><br>';

echo 'Տվյալ զանգվածի միայն զույգ թվերը: ';
foreach ($arr = [1, 4, 7, 8, 10, 15] as $value) {
    if ($value % 2 == 0) {
        echo $value . ' ';
    }
}

echo '<br><br> 5. Կազմիր բազմապատկման աղյուսակ (1-10)՝ օգտագործելով nested for loops։ <br><br>';

echo 'բազմապատկման աղյուսակ 1-10 թվերով: <br>';
for ($i = 1; $i <= 10; $i++) {
    echo $i . '-ի հետ ';
    for ($j = 1; $j <= 10; $j++) {
        echo $i * $j . ' ';
    }
    echo '<br>';
}

echo '<br> 🔢 Զանգվածներ (Arrays) <br><br>';
echo '6. Ստեղծիր բազմաչափ զանգված, որը կներկայացնի դասարան՝ աշակերտներով ու նրանց գնահատականներով։ <br><br>';

$school = [
    'John' => [ 4, 5, 5, 4],
    'Bob' => [ 5, 4, 4, 4],
    'Alice' => [ 4, 5, 4, 3]
];

foreach ($school as $key => $value) {
    echo $key;
    for ($i = 0; $i < count($value); $i++) { // count ֆունկցիան ստանում է array-ի տարրերի քանակը
        echo " $value[$i],";
    }
    echo '<br>';
}

echo '<br> 7. Տպիր բոլոր աշակերտների անունները և նրանց միջին գնահատականը։ <br><br>';

foreach ($school as $key => $value) {
    echo $key;
    $res = 0;
    for ($i = 0; $i < count($value); $i++) { // count ֆունկցիան ստանում է array-ի տարրերի քանակը
        $res += $value[$i];
    }
    echo '-ի միջին գնահատականը։ ' . $res / count($value);

    echo '<br>';
}

echo '<br> 8. Ստուգիր՝ արդյո՞ք զանգվածը դատարկ է։ <br><br>';

$arrTest = [];
if(count($arrTest) == 0) {
    echo 'զանգվածը դատարկ է <br><br>';
} else {
    echo 'զանգվածը դատարկ չէ <br><br>';
}

echo '9. Գումարիր բոլոր արժեքները հետևյալ զանգվածից՝ $numbers = [2, 5, 8, 1, 9]; <br><br>';

$numbers = [2, 5, 8, 1, 9];
$res = 0;
foreach ($numbers as $value) {
    $res += $value;
}
echo 'Զանգվածի անդամների գումարը: ' . $res . '<br><br>';
// echo max($numbers); // սա google-ից եմ նայել js-ի Math․max ֆունկցիայի նման տարբերակ փորձեցի գտնել
echo '10. Տպիր զանգվածի ամենամեծ արժեքը։ <br><br>';
$res = 0;
foreach ($numbers as $value) {
    if ($value > $res) {
        $res = $value;
    }
}
echo 'Զանգվածի ամենամեծ արժեքը: ' . $res . '<br><br>';


echo '🔁 foreach ցիկլ <br><br>';
echo '11. Օգտագործիր foreach և տպիր associative array-ի բոլոր key-value զույգերը։ <br><br>';
$person = array(
    "name" => "Alice",
    "age" => 28,
    "city" => "New York"
);

foreach ($person as $key => $value) {
    echo "$key - $value, <br>";
}

echo '<br> 12. Ստեղծիր զանգված՝ օգտագործողի տվյալներով և տպիր ձևավորված նախադասություն, օրինակ՝ \'անունը՝ Aram, Տարիքը՝ 22\' <br><br>';

echo "անունը՝ {$person["name"]}, Տարիքը՝ {$person["age"]} <br><br>"; // {}-ի անհրաժեժտությունը ինտերնետրց եմ գտել

echo '🔧 Ֆունկցիաներ (Functions) <br><br>';
echo '13. Գրի ֆունկցիա, որը վերադարձնում է տրված թվի ֆակտորիալը։ <br><br>';

$num = 5;
function factorial($num) {
    if ($num <= 1)
        return 1;

    return $num * factorial($num - 1);
}

echo "$num թվի ֆակտորիալը։ " . factorial($num) . ' է<br><br>';

echo '14. Գրի ֆունկցիա, որը ստուգում է՝ թիվը պարզ է, թե ոչ։ <br><br>';

function isPrime($number) {
    if ($number <= 1) {
        echo "$number-ը պարզ թիվ չէ։ <br><br>";
        return;
    }

    for ($i = 2; $i <= sqrt($number); $i++) { // sqrt() գտել եմ google-ից, վերադարձնում է արմատը
        if ($number % $i == 0) {
            echo "$number-ը պարզ թիվ չէ։ <br>";
            return;
        }
    }

    echo "$number-ը պարզ թիվ է։ <br>";
}

isPrime(7);
isPrime(9);

echo '<br> 15. Գրի ֆունկցիա, որը ընդունում է տող և վերադարձնում՝ այդ տողը հետադարձված։ <br><br>';

// strrev()-ը կատարում է տողի հետադարձում

function reverseString($text) {
    $reversed = '';
    $length = mb_strlen($text);

    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= mb_substr($text, $i, 1);
    }

    return $reversed;
}

$original = "Բարեւ աշխարհ";

echo 'original: ' . $original . ' - reversed: ' . reverseString($original) . '<br><br>';

echo '16. Ֆունկցիա, որը հաշվում է զանգվածի միջին արժեքը։ <br><br>';

function mijinArzheq($arr) {
    if (empty($arr)) //
        return 0;

    return array_sum($arr) / count($arr);
}

$arr = [5, 10, 15, 20];
echo "[5, 10, 15, 20] Զանգվածի միջին արժեքը է: " . mijinArzheq($arr) . '<br><br>';

echo '17. Ստեղծիր ռեկուրսիվ ֆունկցիա՝ թվերի գումարը հաշվելու համար (n + n-1 + ... + 1)։ <br><br>';
// կարելի է օգտագործել նաև (n * (n + 1)) / 2
function mijinGumar ($num) {
    if ($num <= 1)
        return 1;

    return $num + mijinGumar($num - 1);
}

$num = 7;
echo "1-ից $num թվերի գումարը: " . mijinGumar($num) . " է";

echo '<hr><br>🧪 Լրացուցիչ <br><br>';

echo '🌀 Ցիկլեր և պայմաններ <br><br>';
echo '1. Գրի ծրագիր, որը տպում է բոլոր 3-ի և 7-ի բաժանվող թվերը 1-ից 100 միջակայքում։ <br><br>';

echo '3-ի և 7-ի բաժանվող թվերը 1-ից 100 միջակայքում։ ';
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 7 == 0) {
        echo $i . ' ';
    }
}
echo '<br><br>';

echo '2. Օգտագործելով do...while, տպիր «PHP սեսիա» այնքան անգամ, քանի դեռ պատահական թիվը փոքր է 80-ից։ <br><br>';

do {
    $num = rand(1, 100);
    echo "$num. «PHP սեսիա»<br>";

} while ($num < 80);

echo '<br>3. Գրի for ցիկլ, որը տպում է միայն այն թվերը, որոնք ավարտվում են «7» թվով։ <br><br>';

echo 'այն թվերը, որոնք ավարտվում են «7» թվով։ ';
for ($i = 1; $i <= 100; $i++) {
    if (str_ends_with($i, '7')) {
        echo $i . ', ';
    }
}

echo '<br><br> 4. while ցիկլով հաշվիր և տպիր 1-ից 50 թվերի միջին արժեքը։ <br><br>';
$i = 1;
$res = 0;
while ($i <= 50) {
    $res += $i;
    $i++;
}

echo '1-ից 50 թվերի միջին արժեքը: ' . $res / 50 . '<br><br>';

echo '5. Տրված է $n = 6; տպիր բոլոր հնարավոր բաժանիչները։ <br><br>';
echo '6-ի բոլոր հնարավոր բաժանիչները: ';
for ($i = 1; $i <= 6; $i++) {
    if (6 % $i == 0) {
        echo $i . ' ';
    }
}


echo '<br><br>🧠 Ֆունկցիաներ <br><br>';
echo '6. Ֆունկցիա, որը հաշվում է տողի բառերի քանակը։ <br><br>';

function numberOfWords($str)
{
    $arr = explode(' ', $str);
    return count($arr);
}

echo 'Ֆունկցիա, որը հաշվում է տողի բառերի քանակը։ - '
    . numberOfWords("Ֆունկցիա, որը հաշվում է տողի բառերի քանակը։")
    .' բառ է<br><br>';

echo '7. Ֆունկցիա, որը տողի առաջին տառը դարձնում է մեծատառ։ <br><br>';

// ucfirst() գտել բայց չեմ կիռառել
function capitalizeFirstLetter($str) {
    $firstLetter = strtoupper($str[0]);
    $restOfString = substr($str, 1);
    return $firstLetter . $restOfString;
}

echo capitalizeFirstLetter("hello world");

echo '<br><br> 8. Ֆունկցիա, որը ստուգում է՝ արդյոք զանգվածում կա տրված արժեքը։ <br><br>';

$res = ['test', false];

function arrInspection($arr, $x) {
    foreach($arr as $value) {
        if($value === $x){
            return true;
        }
    }
    return false;
}

$res[1] = arrInspection(['test', 'test1', 'test2', 'test3'], $res[0]);

if( $res[1] )
    echo "Այո $res[0] արժեքը կա տրված զանգվածում․<br><br>";
else
    echo "Ոչ $res[0] արժեքը չկա տրված զանգվածում․<br><br>";

echo '9. Ֆունկցիա, որը ընդունում է զանգված և վերադարձնում զտված տարբերակը՝ միայն թվերը։ <br><br>';

echo 'Ֆունկցիա որը վերադարձնում է զտվածի արժեքներից միայն թվերը։ ';
function filter_numbers($array) {
    return array_filter($array, function($item) {
        if( is_int($item) || is_float($item)){
            echo "$item, ";
        };
    });
}

filter_numbers([1, "hello", 3.14, true, "42", 7, null, [1, 2]]);

echo '<br><br>10. Ֆունկցիա, որը գտնում է զանգվածի երկրորդ մեծագույն տարրը։ <br><br>';

function max2($arr)
{
    $unique = array_unique($arr);
    rsort($unique);

    if (count($unique) >= 2) {
        return $unique[1];
    }
}

$array = [10, 15, 32, 17, 21];
echo '[' . implode(', ', $array) . ']-զանգվածի երկրորդ մեծագույն տարրը։ ' . max2($array);

echo '<br><br> 🛠 Տողեր (Strings) <br><br>';
echo '11. Տրված է տող։ Տպիր այն բառերը, որոնք պարունակում են «a» տառը։ <br><br>';

$str = 'Given a string, print the words that contain the letter "a"';
$arr = explode(' ', $str);

$filtered = array_filter($arr, function($word) {
    return strpos($word, 'a') !== false;
});

echo $str . ': ' . implode(', ', $filtered) . '<br><br>';

echo '12. Տողում գտիր ու հաշվիր բոլոր թվանշանները։ <br><br>';

$str = 'Today is 2025-04-16, and we met 3 times!';

$arr = preg_split('/[\s,.\-+\/]/', $str);

$filtered = [];

foreach ($arr as $value) {
    if(is_numeric($value)){
        $filtered[] = $value;
    }
}

echo 'բոլոր թվանշանների քանակը։ ' . count($filtered) . '<br><br>';

echo '13. Գրի ֆունկցիա, որը միացնում է մի քանի տողեր ,-ով բաժանված։ <br><br>';

function join_lines($lines) {
    return implode(', ', $lines);
}

$lines = ["Տող 1", "Տող 2", "Տող 3", "Տող 4"];
echo join_lines($lines);

echo '<br><br> 14. Տողը վերածիր զանգվածի, բաժանելով այն բացատներով։ <br><br>';

$str = 'This is a sample sentence';

$array = explode(' ', $str);
echo '[' . implode(', ', $array) . ']';

echo '<br><br>15. Ստուգիր՝ արդյոք տողը սկսվում է որոշակի ենթատողով։ <br><br>';

$str = 'Hello, world!';
$prefix = 'Hello';

if (substr($str, 0, strlen($prefix)) === $prefix) {
    echo "$str Տողը սկսվում է '$prefix'-ով։";
} else {
    echo "$str Տողը չի սկսվում '$prefix'-ով։";
}
?>