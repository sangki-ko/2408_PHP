<?php

// -------------------------
// if문 : 조건에 따라서 서로 다른 처리를 할 때 사용하는 문법
// -------------------------

// $num =6;
// if($num === 10) {
//     echo "10입니다!\n";
// } else if($num === 5) {
//     echo "5입니다!\n";
// } else if ($num === 15){ 
//     echo "15입니다!\n";
// } else {
//     echo "숫자입니다!";
// }

$rank = 10;
if($rank === 1) {
    echo"1등입니다!\n";
} 
else if($rank === 2) {
    echo"2등입니다!\n";
} 
else if($rank === 3) {
    echo"3등입니다!\n";
} 
else if($rank === 5) {
    echo"특별상입니다!\n";
} 
else {
    echo "순위 외입니다.\n";
}


$answer1 = 2;
$answer2 = 5;

if($answer1 >=== $answer2) {
    echo "100점";
} 
else if($answer1 === 2 || $answer2 === 5) {
    echo "50점";
}
else {
    echo "0점";
}

var_dump(1 <= 0);