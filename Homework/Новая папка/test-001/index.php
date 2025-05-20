<?php
// ----- ֆայլի հետ աշխատել ---------------------------------------
//
$file = 'text.txt';
$f = fopen($file, 'a+');
//
//fwrite($f, "\nHello World!");          // ֆայլի վերջում ավելացնել
//fseek($f, 0);                         // գնալ 0-ինդեքս, այսինքն սկիզբ

//echo "<pre>";
echo fread($f, filesize($file));     // կարդալ ամբողջ պարունակությունը
// echo fread($f, 10);                      // կարդալ 10 սինոլ
//echo "</pre>";
fclose($f);

// ----- ժամանակաոր ֆայլ ---------------------------------------

//$temp_file = tmpfile();
//fwrite($temp_file, "Hello World!");
//fseek($temp_file, 0);
//echo fread($temp_file, filesize($temp_file));
//fclose($temp_file);

// ----- ֆայլի և մասիվի հետ աշխատել(file => array) ---------------------------------------

$file2 = 'text2.txt';
$arr2 = file($file2);
echo "<pre>";
print_r($arr2);
echo "</pre>";

// ----- ֆայլի և մասիվի հետ աշխատել(array => file) ---------------------------------------

$arr2 = [10, 20, 30, 40, 50];
file_put_contents($file2, implode("\n", $arr2));











