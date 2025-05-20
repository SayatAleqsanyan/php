<?php
echo '<a href="index.php">📝 Տնային</a> <a href="index3.php">🧪 Լրացուցիչ</a><br><br>';

echo '🧪 Լրացուցիչ առաջադրանքներ (31–60)<br><br>';

echo '🧠 Array և Loop առաջադրանքներ (31–45)<br><br>';
echo '31. Ստեղծիր զանգված, որտեղ պահված են ֆիլմերի վերնագրեր։ Տպիր միայն այն վերնագրերը, որոնք պարունակում են “The” բառը։<br><br>';

$arr = ['The Gangster, the Cop, the Devil', 'Interstellar', 'Oppenheimer', 'John Wick', 'Venom: The Last Dance',
    'Harry Potter and the Philosopher\'s Stone', 'The Shawshank Redemption', 'Seen', 'The Matrix', 'The Dark Knight'];

echo 'զանգվածց այն ֆիլմերի անունները, որոնք պարունակում են “The” բառը։ "';
foreach ($arr as $value) {
    if (strpos($value, 'The') !== false) {
        echo $value . '", ';
    }
}

echo '<br><br>32. Տվյալ թվային զանգվածից ձևավորի նոր զանգված, որտեղ ամեն տարրին ավելացված է իր ինդեքսը։<br><br>';

$arr = [93, 9, 45, 1, 91, 3, 9, 55, 65, 95, 75, 27, 61, 97, 85, 47, 29, 41, 13, 5, 33, 33, 27, 9, 23, 23];

foreach ($arr as $key => $value) {
    $arr[$key] = $value + $key;
}

echo 'արդյունքը: ' . implode(', ', $arr);

echo '<br><br>33. Ստեղծիր զանգված 100 պատահական թվերով (range և shuffle)։ Տպիր միայն կենտերը։<br><br>';

echo 'այն պատահական թվերը որոնք կենտ են ։ ';
$arr = [];
for ($i = 0; $i < 100; $i++) {
    $arr[$i] = rand(1, 100);
    if ($arr[$i] % 2 == 1) {
        echo $arr[$i] . ', ';
    }
}

echo '<br><br>34. Ստեղծիր 2 զանգված՝ անուններ և տարիքը։ Գրի ֆունկցիա, որը վերադարձնում է բոլոր այն անունները, ում տարիքը մեծ է 30-ից։<br><br>';

$names = ["Աննա", "Գոռ", "Լիլիթ", "Սամվել", "Մարիա"];
$ages = [25, 35, 28, 40, 31];

function getnames($names, $ages){
    $res = [];

    for ($i = 0; $i < count($names); $i++) {
        if ($ages[$i] > 30) {
            $res[$names[$i]] = $ages[$i];
        }
    }
    return $res;
}

$arr = getnames($names, $ages);
echo 'արդյունքը: ' . implode(', ', $arr);

echo '<br><br>35. Տրված զանգվածում հաշվիր թե քանի անգամ է “apple” բառը կրկնվում։<br><br>';

$arr = ['apple', 'pear', 'fig', 'strawberry', 'apple', 'yellow', 'apple', 'grapes', 'apple', 'strawberry' ];
$counts = 0;

foreach ($arr as $value) {
    if ($value == 'apple') {
        $counts++;
    }
}

echo ' “apple” բառը կրկնվում է ' . $counts . ' անգամը։';

echo '<br><br>36. Ստեղծիր զանգված 10 բառերով։ Տպիր ամենաերկար բառը։<br><br>';

$arr = ['apple', 'pear', 'fig', 'pomegranate', 'apple', 'yellow', 'apple', 'grapes', 'apple', 'strawberry' ];
$word = '';

foreach ($arr as $value) {
    if (mb_strlen($value) > mb_strlen($word)) {
        $word = $value;
    }
}
echo 'զանգվածի ամենաերկար բառը: ' . $word . ' Է <br><br>';

echo '37. Գրի ֆունկցիա, որը ստանում է թվերի զանգված և վերադարձնում միայն պոզիտիվ թվերը։<br><br>';

function getnums($nums){
    $res = [];

    foreach ($nums as $value) {
        if ($value > 0) {
            $res[] =  $value;
        }
    }

    echo 'արդյունքը: ' . implode(', ',$res);
}

$nums = [-5, 0, 3, 7, -2, 10];
getnums($nums);

echo '<br><br>38. Ստեղծիր բազմաչափ զանգված, որը ներկայացնում է ուսուցիչներ և նրանց դասավանդած առարկաները։ Տպիր բոլոր ուսուցիչների անունները։<br><br>';

$teachers = [
    [
        "first name" => "John",
        "last name" => "Smith",
        "subjects" => ["Mathematics", "Physics"]
    ],
    [
        "first name" => "Emily",
        "last name" => "Johnson",
        "subjects" => ["English", "History"]
    ],
    [
        "first name" => "Michael",
        "last name" => "Brown",
        "subjects" => ["Biology", "Chemistry"]
    ],
    [
        "first name" => "Sarah",
        "last name" => "Davis",
        "subjects" => ["Geography", "Civics"]
    ]
];

echo 'ուսուցիչների անունները: ';
foreach ($teachers as $name) {
    echo $name['first name'] . ', ';
}

echo '<br><br>39. Ստեղծիր զանգված, որտեղ կլինեն տարվա ամիսները։ Օգտագործիր loop՝ տպելու ամեն ամիս նոր տողի վրա՝ համապատասխան հերթականությամբ։<br><br>';

$months = [
    "January", "February", "March", "April",
    "May", "June", "July", "August",
    "September", "October", "November", "December"
];

foreach ($months as $key => $month) {
    $key2 = str_pad($key + 1, 2, "0", STR_PAD_LEFT); // google-ից եմ գտել դիմացից 0 ավելացնելու համար
    echo $key2 . ' => ' . $month . '<br>';
}

echo '<br>40. Տրված զանգվածից ջնջիր կրկնվող արժեքները՝ array_unique-ով։<br><br>';

$arr = ['apple', 'pear', 'fig', 'pomegranate', 'apple', 'yellow', 'apple', 'grapes', 'apple', 'strawberry' ];
echo 'կրկնվող արժեքները հեռացված են: ' . implode(', ', array_unique($arr));

echo '<br><br>41. Գրի ֆունկցիա, որը ստանում է ասոցիատիվ զանգված և վերադարձնում բանալիների և արժեքների թվաքանակը։<br><br>';

function countvelue($arr)
{
    $countvalue = 0;
    $countkey = 0;

    foreach ($arr as $key => $value) {
        if ($value || $value === 0) {
            $countvalue++;
        }
        $countkey++;
    }

    echo 'բանալիների թվաքանակը: ' . $countkey . ', արժեքների թվաքանակը: ' . $countvalue;
}

$arr = [
  'a' => 1,
  'b' => 2,
  'c' => 3,
  'd' => 4,
  'e' => 5,
  'f' => 6,
  'g' => null,
  'h' => '',
  'i' => false,
  'j' => 0
];

countvelue($arr);

echo '<br><br>42. Տրված զանգվածում հաշվի՝ քանի տառային, թվային և բուլ արժեք կա։<br><br>';

$data = [
    "name" => "Armen",
    "surname" => "Hakobyan",
    "age" => 28,
    "height" => 1.75,
    "weight" => 68.5,
    "is_student" => true,
    "has_passport" => false,
    "city" => "Yerevan",
    "country" => "Armenia",
    "score" => 95,
    "graduated" => true,
    "phone" => "+37499123456",
    "email_verified" => false,
    "children" => 0,
    "pets" => null,
    "balance" => 0.00,
    "married" => false,
    "languages" => ["Armenian", "English", "Russian"],
    "birth_date" => "1995-03-15",
    "membership_active" => true,
    "notes" => null
];

$number = 0;
$string = 0;
$boolean = 0;
$other = 0;

foreach ($data as $key => $value) {
    if (is_string($value)) {
        $string++;
    } elseif (is_numeric($value)) {
        $number++;
    } elseif (is_bool($value)) {
        $boolean++;
    } else {
        $other++;
    }
}

echo 'թվային արժեքներ: ' . $number .
     '<br>տառային արժեքներ: ' . $string .
     '<br>բուլ արժեքներ: ' . $boolean .
     '<br>այլ արժեքներ: ' . $other;

echo '<br><br>43. Տրված ասոցիատիվ զանգվածը դասավորի ըստ բանալիների (key sort)։<br><br>';
ksort($data);

echo 'արդյունքը: <pre>';
print_r($data);
echo '</pre>';

echo '44. Ստեղծիր զանգված 10 անուններով, դասավորիր դրանք այբենական հերթականությամբ։<br><br>';

$names = ["Armen", "Sona", "Hayk", "Nare", "Gor", "Lilit", "Tigran", "Mariam", "Levon", "Ani"];
sort($names);

echo 'արդյունքը: <pre>';
print_r($names);
echo '</pre>';

echo '45. Տրված զանգվածում դարձնել բոլոր արժեքները մեծատառ՝ strtoupper()։<br><br>';

foreach ($names as $key => $value) {
    $names[$key] = strtoupper($value);
}

echo 'արդյունքը: <pre>';
print_r($names);
echo '</pre>';

echo '46. Տրված տեքստում հաշվիր քանի նիշ կա առանց բացատների։<br><br>';

$str = "Տրված տեքստում հաշվիր քանի նիշ կա առանց բացատների";
$arr = mb_str_split($str);
$res = 0;
foreach ($arr as $value) {
    if ($value !== ' ') {
        $res++;
    }
}

echo "Տրված տեքստում առանց բացատների կա $res նիշ<br><br>";

echo '47. Տեքստից հանիր բոլոր կետադրական նշանները։<br><br>';

function removePunctuation($str)
{
    $arr = [];
    $chars = mb_str_split($str);

    foreach ($chars as $value) {
        if (!preg_match('/^\p{P}$/u', $value)) {
            $arr[] = $value;
        }
    }

    echo 'Տեքստից առանց կետադրական նշանների: ' . implode('', $arr) . '<br><br>';
}

$str = "Տրված տեքստում, հաշվիր, քանի, նիշ կա, առանց բացատների";
removePunctuation($str);

echo '48. Տեքստի յուրաքանչյուր բառի մեջ փոխարինի “e” տառը “3”-ով։<br><br>';

$str = 'Replace the letter “e” with “3” in each word of the text.';
echo 'Replace the letter “e” with “3” in each word of the text. <br> '
    . str_replace('e', '3', $str) . '<br><br>';

echo '49. Տրված նախադասությունից ձևավորի զանգված, որտեղ միայն եզակի բառերն են։<br><br>';

$str = 'Տրված նախադասությունից նախադասությունից ձևավորի ձևավորի զանգված որտեղ որտեղ միայն եզակի բառերն են են են են :';
$arr = array_unique(explode(' ', $str));

echo 'արդյունքը: <pre>';
print_r($arr);
echo '</pre>';

echo '50. Տեքստում highlight արա բոլոր բառերը, որոնք սկսվում են “re” նախածանցով։<br><br>';

$str = 'The researchers reviewed the results and recommended revisions to the report.';
$arr = explode(' ', $str);

foreach ($arr as $key => $value) {
    if (strpos($value, 're') !== false) {
        $arr[$key] = '<ins>' . $value . '</ins>';
    } else {
        $arr[$key] = $value;
    }
}

echo implode(' ', $arr);

echo '<br><br>51. Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն ու վերադարձնում միայն այն բառերը, որոնք պարունակում են թվեր։<br><br>';

function string($str)
{
    $arr = [];
    $words = explode(' ', $str);
    foreach ($words as $word) {
        if (preg_match('/\d/', $word)) {
            $arr[] = $word;
        }
    }

    return $arr;
}

echo 'արդյունքը: <pre>';
print_r(string('The 2019 election wa4s a major victory for Do4nald Trump'));
echo '</pre>';

echo '52. Գրի ֆունկցիա, որը ստուգում է՝ արդյոք տրված բառը գտնվում է նախադասության մեջ։<br><br>';

function inspection($str, $word)
{
    $str = mb_strtolower($str);
    $word = mb_strtolower($word);

    if (preg_match('/\b' . preg_quote($word, '/') . '\b/u', $str)) {
        echo 'Այո ՛' . $word . '՛ բառը տեքստում կա<br>';
    } else {
        echo 'Ոչ ՛' . $word . '՛ բառը տեքստում չկա<br>';
    }
}

inspection('Գրի ֆունկցիա, որը ստուգում է՝ արդյոք տրված բառը գտնվում է նախադասության մեջ։', 'ֆունկցիա');

echo '<br>53. Տեքստի ամեն բառից թող միայն առաջին երեք նիշը։<br><br>';

$str = 'Տեքստի ամեն բառից թող միայն առաջին երեք նիշը։';
$words = explode(' ', $str);

foreach ($words as $key => $value) {
    $words[$key] = mb_substr($value, 0, 3);
}
echo implode(' ', $words);

echo '<br><br>54. Ստեղծիր ֆունկցիա, որը նախադասության բոլոր բառերը դարձնում է հակառակ ուղղությամբ։<br><br>';

function inspection2($str)
{
    $arr = explode(' ', $str);

    foreach ($arr as $key => $value) {
        $arr[$key] = implode('', array_reverse(mb_str_split($value)));
    }

    echo implode(' ', $arr);
}

inspection2('Ստեղծիր ֆունկցիա, որը նախադասության բոլոր բառերը դարձնում է հակառակ ուղղությամբ');

echo '<br><br>55. Տեքստում հաշվիր քանի մեծատառ կա և քանի փոքրատառ։<br><br>';

$str = 'Տեքստում հաշվիր քանի Մեծատառ Կա և քանի փոքրատառ։';
$arr = mb_str_split($str);
$upper = 0;
$lower = 0;
$other = 0;
foreach ($arr as $char) {
    if ($char !== mb_strtolower($char, 'UTF-8') && $char === mb_strtoupper($char, 'UTF-8')) {
        $upper++;
    } elseif ($char === mb_strtolower($char, 'UTF-8') && $char !== mb_strtoupper($char, 'UTF-8')) {
        $lower++;
    } else {
        $other++;
    }
}

echo "Տեքստում կա $upper մեծատառ, $lower փոքրատառ և $other ոչ տառ<br><br>";

echo '56. Տեքստում փոխարինի բոլոր բացատները “-” նշանով։<br><br>';

$str = 'Տեքստում փոխարինի բոլոր բացատները “-” նշանով։';
echo str_replace(' ', '-', $str);

echo '<br><br>57. Գրի ֆունկցիա, որը ստուգում է՝ արդյոք տրված տեքստը ավարտվում է որոշակի բառով։<br><br>';

function isEnd($str, $word)
{
    if (str_ends_with($str, $word)) {
        echo 'Այո "' . $str . '" տեքստը ավարտվում է "' . $word . '" բառով:<br><br>';
    } else {
        echo 'Ոչ "' . $str . '" տեքստը չի ավարտվում "' . $word . '" բառով:<br><br>';
    }
}

isEnd('Գրի ֆունկցիա, որը ստուգում է՝ արդյոք տրված տեքստը ավարտվում է որոշակի բառով։', 'բառով։');

echo '58. Տեքստից հանի բոլոր կրկնվող բառերը։<br><br>';

//
$str = 'Տեքստից հանի բոլոր կրկնվող բառերը Տեքստից հանի բոլոր կրկնվող կրկնվող բառերը բառերը';
$arr = array_unique(explode(' ', $str));
echo $str . ' => ' . implode(' ', $arr);

echo '<br><br>59. Տեքստը կտրի ըստ նախադասությունների (punctuation-based explode)։<br><br>';

$str = 'Տեքստը կտրի, ըստ նախադասությունների! (punctuation-based explode)։ Տեքստը կտրի ըստ` նախադասությունների? (punctuation-based explode)։';

$parts = preg_split('/[։!?]+/u', $str, -1, PREG_SPLIT_NO_EMPTY);
$parts = array_map('trim', $parts);

echo 'արդյունքը: <pre>';
print_r($parts);
echo '</pre>';

echo '60. Տեքստի մեջ փոփոխություն կատարի այնպես, որ ամեն երկրորդ բառը լինի մեծատառով։<br><br>';

$str = 'Տեքստի մեջ փոփոխություն կատարի այնպես, որ ամեն երկրորդ բառը լինի մեծատառով';
$arr = explode(' ', $str);

foreach ($arr as $key => $value) {
    if ($key % 2 == 1) {
        $arr[$key] = mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
    }
}

echo implode(' ', $arr);