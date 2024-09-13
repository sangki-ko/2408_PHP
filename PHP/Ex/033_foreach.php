<?php

//foreach문 : 배열을 편하게 루프하기 위한 반복문

$arr = [1, 2, 3];
foreach($arr as $key => $val)
    echo "key : ".$key.", value : ".$val."\n"

$arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
foreach($arr2 as $e) {
    echo "3 X ".$e." = ".($e*3)."\n";
}

// 연관 배열의 경우

$arr3 = [
    "name" => "최상기"
    ,"age" => 7
    ,"gender" => "X"
];

// foreach($arr3 as $ : ".$val."\nkey => $val) {
//     echo $key[0]."";
// }



