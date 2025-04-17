<!-- ########################### Array ################################ -->
<?php
//$arr = ["Bal", "Tand", "Tiran", 45, 0.5, true];
//var_dump($arr);
?>
<!-- ---------------------------- -->
<?php
//$arr = array("Bal", "Tand", "Tiran");
//var_dump($arr);
//$arr[0] = "Xndor";
//$arr[1] = "Deghd";
//$arr[2] = "Gndak";
//$arr[3] = "test";
//$arr[13] = "wwe";
//$arr[] = "test2";
//var_dump($arr);
?>
<!-- ------------------- Associative Arrays ----------------------- -->
<?php
//$salaries = array("Anna" => 2000, "Nare" => 1000, "Zara" => 500);
//var_dump($salaries);
//
//$salaries['Anna'] = 20000;
//$salaries['Nare'] = 10000;
//$salaries['Zara'] = 5000;
//var_dump($salaries);
?>

<!-- ------------------ Multidimensional Arrays ------------------ -->
<?php
//$courses = array(
//    "Anna" => array(
//        "level-1" => "html css",
//        "level-2" => "JAVASCRIPT",
//        "level-3" => "React js"
//    ),
//    "Nare" => array(
//        "level-1" => "php",
//        "level-2" => "mysql",
//        "level-3" => "laravel"
//    )
//);
////var_dump($courses);
////
//echo "<pre>";
////print_r($courses);
//var_dump($courses);
//echo "</pre>";

?>

<!-- ------------------ Array count() ------------------ -->
<?php
//$cars = array("volvo", "bmw", "toyota");
//echo count($cars);

// -----------------------
//$cars = array("volvo", "bmw", "toyota");
//$arrLength =  count($cars);
//
//for ($i=0; $i < $arrLength; $i++) {
//    echo $cars[$i];
//    echo "<br />";
//}

?>
<!-- ########################## String Functions ###################### -->

<!-- ---------------- explode ----------- -->
<?php
//$text = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod reprehenderit porro ipsa";
//$arr = explode(" ", $text);
//var_dump($arr);
?>
<!-- ---------------- str_split ----------- -->
<?php
//$text = "Lorem consectetur";
//$arr = str_split($text);
//var_dump($arr);
?>
<!-- ---------------- implode ----------- -->
<?php
//$text = array("Lorem", "dolor", "adipisicing", "elit");
//echo implode(" ", $text)."<hr />";
//echo implode("+", $text)."<hr />";
//echo implode("*", $text)."<hr />";
//echo implode("@", $text)."<hr />";
?>
<!-- ---------------- strpos ----------- -->
<?php
//$text = strpos("I love php, I love php too!","php");
//echo $text;

// -----------------------------------
//$text = strpos("I love php, I love php too!","php", 10);
//echo $text;

?>
<!-- ---------------- strlen ----------- -->
<?php
//$text = strlen("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod reprehenderit porro ipsa");
//echo $text;
?>
<!-- ---------------- strrev ----------- -->
<?php
//$text = strrev("Lorem ipsum dolor sit");
//echo $text;
?>
<!-- ////////////////////////////////////// -->
<?php
//$loremtext = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod reprehenderit porro ipsa";
//$ex = explode(" ", $loremtext);
//for ($i=0; $i < count($ex); $i++) {
//    if (strlen($ex[$i]) >= 6) {
//        echo $ex[$i];
//    }
//}
?>
<!-- ---------------- strtolower ----------- -->
<?php
//$text = strtolower("LOREM ipsum DOLOR SIT");
//echo $text;
?>

<!-- ---------------- strtoupper ----------- -->
<?php
//$text = strtoupper("Lorem ipsum dolor sit");
//echo $text;
?>

<!-- ---------------- substr ----------- -->
<?php
//$text = substr("Lorem ipsum  dolor sit",7,3);
//echo $text;
?>
<!-- ---------------- trim ----------- -->
<?php
//$str = "Hello World!";
//echo $str . "<br />";
//echo trim($str, "Hed!");
?>




<!-- ################################################################## -->


<?php
//$text = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod reprehenderit porro ipsa";
//$str_ktrel = explode(" " , $text);
//for ($i=0; $i < count($str_ktrel); $i++) {
//    if (strlen($str_ktrel[$i]) >= 8) {
//        $str_ktrel[$i] = "<mark>" . $str_ktrel[$i] . "</mark>";
//    }
//}
//$miacnel_irar = implode(" ", $str_ktrel);
//echo $miacnel_irar;
?>

<form action="action.php">
    <button type="submit">Next</button>
</form>



<a href="action.php">action</a>


<?php

include "action.php";
include_once "action.php";
require "action.php";
require_once "action.php";

hi();