<?php
echo '<a href="index.php">📝 Տնային</a> <a href="index3.php">🧪 Լրացուցիչ</a><br><br>';

echo '📝 Տնային առաջադրանքներ (16–30)<br><br>';

echo '<a href="index.php">🧠 Array-ների</a> <a href="index2.php">🧠 String-երի</a><br><br>';
echo '🧠 String-երի առաջադրանքներ (16–30)<br><br>';

echo '16. Տեղադրի տրված նախադասությունը explode-ով բառերի զանգվածի մեջ։ Հաշվիր քանի բառ կա։<br><br>';

$str = 'Տեղադրի տրված նախադասությունը explode-ով բառերի զանգվածի մեջ։ Հաշվիր քանի բառ կա։';
$arr = explode(' ', $str);

echo 'բառերի քանակը: ' . count($arr) . '<br><br>';

echo '17. Գրի ֆունկցիա, որը տրված նախադասության բոլոր բառերը դարձնում է մեծատառ։<br><br>';

function toUpper($str) {
    return mb_strtoupper($str);
}

echo toUpper('Գրի ֆունկցիա, որը տրված նախադասության բոլոր բառերը դարձնում է մեծատառ։');

echo '<br><br>18. Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն ու վերադարձնում է այն՝ հակառակ ուղղությամբ։<br><br>';

function toReverse($str) {
    // $arr = explode(' ', $str); // ''-ով սխալ է տալիս
    $arr = mb_str_split($str);

    $arr = array_reverse($arr);

    return implode('', $arr);
}

echo 'արդյունքը: ' . toReverse('Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն ու վերադարձնում է այն՝ հակառակ ուղղությամբ։');

echo '<br><br> 19. Տրված նախադասության մեջ փնտրիր մի բառ՝ strpos-ի միջոցով։<br><br>';

$str = 'Տրված նախադասության մեջ փնտրիր մի բառ՝ strpos-ի միջոցով';
echo 'այս "բառ"-ը գտնվում է: ' . mb_strpos($str, 'բառ') . ' ինդեքսում<br><br>';

echo '20. Տրված նախադասությունից հանիր առաջին 10 նիշը։<br><br>';

$str = 'Տրված նախադասությունից հանիր առաջին 10 նիշը։';
$str = mb_substr($str, 10);
echo 'արդյունքը: ' . $str . '<br><br>';

echo '21. Տրված նախադասությունից հեռացրու բացատները trim()-ի և str_replace()-ի միջոցով։<br><br>';

$str = '       Տրված նախադասությունից հեռացրու բացատները trim()-ի և str_replace()-ի միջոցով        ';
$str = trim($str);
$str = str_replace(' ', '', $str);
echo 'արդյունքը: ' . $str . '<br><br>';


echo '22. Ստեղծիր ֆունկցիա, որը ստուգում է՝ արդյոք տեքստը սկսվում է որոշակի բառով։<br><br>';

function startsWith($string, $word) {
    return mb_substr($string, 0, mb_strlen($word)) === $word;
}

$word = 'Ստեղծիր';
$str = 'Ստեղծիր ֆունկցիա, որը ստուգում է՝ արդյոք տեքստը սկսվում է որոշակի բառով։';

if (startsWith($str, $word)) {
    echo 'Այո սկսվում է: "' . $word . '" բառով<br><br>';
} else {
    echo 'Ոչ չի սկսվում: "' . $word . '" բառով<br><br>';
}

echo '23. Տրված նախադասության յուրաքանչյուր բառի առաջին տառը դարձրու մեծատառ՝ ucfirst().<br><br>';

$str = 'Տրված նախադասության յուրաքանչյուր բառի առաջին տառը դարձրու մեծատառ՝ ucfirst().';
$arr = explode(' ', $str);

// ucfirst() հայերեն լեզվի հետ չի ստացվում
foreach ($arr as $value) { // 'UTF-8' google-ից եմ ավելացրել առանց դրա ոչ բոլոր բառերն են դառնում մեծատառով
    $a = mb_substr($value, 0, 1, 'UTF-8');
    $b = mb_substr($value, 1, null, 'UTF-8');
    echo mb_strtoupper($a, 'UTF-8') . $b . ' ';
}

echo '<br><br> 24. Տրված նախադասությունից դուրս բեր միայն այն բառերը, որոնք սկսվում են մեծատառով։<br><br>';

$str = 'Տրված նախադասությունից Դուրս Բեր միայն այն Բառերը, որոնք Սկսվում են Մեծատառով';
$arr = explode(' ', $str);

foreach ($arr as $value) {
    if (mb_substr($value, 0, 1, 'UTF-8') == mb_strtoupper(mb_substr($value, 0, 1, 'UTF-8'), 'UTF-8')) {
        echo $value . ' ';
    }
}

echo '<br><br>25. Ստեղծիր ֆունկցիա, որը հաշվում է՝ քանի անգամ է մի բառ հանդիպում տեքստում։<br><br>';

function countstr($str)
{
    $arr = [];
    $arrste = explode(' ', $str);

    foreach ($arrste as $value) {
        if(array_key_exists($value, $arr)) {
            $arr[$value] += 1;
        } else {
            $arr[$value] = 1;
        }
    }
    return $arr;
}

echo 'արդյունքը: <pre>';
print_r(countstr('Ստեղծիր Ստեղծիր ֆունկցիա ֆունկցիա ֆունկցիա որը հաշվում է քանի անգամ է մի բառ հանդիպում տեքստում'));
echo '</pre> <br>';

echo '26. Տեքստը բաժանիր str_split-ով առանձին նիշերի զանգվածի մեջ, հետո reverse արա array_reverse-ով։<br><br>';

$str = 'Տեքստը բաժանիր str_split-ով առանձին նիշերի զանգվածի մեջ, հետո reverse արա array_reverse-ով։';
$arr = mb_str_split($str);
echo 'արդյունքը: ' . implode(' ', array_reverse($arr)) . '<br><br>';

echo '27. Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն և նշում բոլոր այն բառերը \<b\>-ով, որոնց երկարությունը 7-ից շատ է։<br><br>';

function strb($str)
{
    $arr = explode(' ', $str);
    foreach ($arr as $key => $value) {
        if (mb_strlen($value) > 7) {
            $arr[$key] = '<b>' . $value . '</b>';
        } else {
            $arr[$key] = $value;
        }
    }

    return implode(' ', $arr);
}

$str =  strb('Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն և նշում բոլոր այն բառերը \<b\>-ով, որոնց երկարությունը 7-ից շատ է։');
echo 'արդյունքը: ' . $str . '<br><br>';

echo '28. Ստեղծիր ֆունկցիա, որը ստուգում է՝ արդյոք տեքստը palindrom է։<br><br>';

function palindrom($str)
{
    $res = true;
    $arr = mb_str_split($str);

    for ($i = 0; $i < count($arr) / 2; $i++) {
        if ($arr[$i] != $arr[count($arr) - $i - 1]) {
            $res = false;
        }
    }

    if(!$res)
        echo 'Ոչ, տեքստը palindrom չէ<br>';
    else
        echo 'Այո, տեքստը palindrom չէ<br>';
}

palindrom('Ստեղծիր ֆունկցիա, որը ստուգում է՝ արդյոք տեքստը palindrom է');
palindrom('ապա');

echo '<br>29. Տվյալ տեքստում փոխարինի բոլոր “a” տառերը “@”-ով։<br><br>';

$str = 'Տվյալ տեքստում փոխարինի բոլոր “a” տառերը “@”-ով։';

echo 'արդյունքը: ' . str_replace('ա', '@', $str) . '<br><br>';

echo '30. Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն և վերադարձնում է բառերի քանակը, նիշերի քանակը և ամենաերկար բառը։<br><br>';

function strinfo($str)
{
    $arr1 = explode(' ', $str);
    $arr2 = mb_str_split($str);

    $longest = '';
    foreach ($arr1 as $word) {
        if (mb_strlen($word, 'UTF-8') > mb_strlen($longest, 'UTF-8')) {
            $longest = $word;
        }
    }

    echo 'բառերի քանակը: ' . count($arr1) . '<br>';
    echo 'նիշերի քանակը: ' . count($arr2) . '<br>';
    echo 'ամենաերկար բառը: ' . $longest . '<br>';
}

strinfo('Ստեղծիր ֆունկցիա, որը ստանում է նախադասություն և վերադարձնում է բառերի քանակը, նիշերի քանակը և ամենաերկար բառը։');