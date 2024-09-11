<?php

// 1. 3의 배수 게임

$ber = 3;

// for($num = 1; $num <= 100; $num++) {
//     echo $num;
//     for($ber = )
// }

for($i = 1; $i <= 100; $i++) {
    if(($i % 3) === 0) {
        echo "짝\n";
        continue;
    }
    echo $i."\n";
}


// 2. 반복문을 이용하여 급여가 5000이상이고, 성별인 남자인 사원의 id와 이름을 출력해주세요.

$arr = [
    ["id" => 1, "name" => "미어캣", "gender" => "M", "salary" => "6000" ],
    ["id" => 2, "name" => "홍길동", "gender" => "M", "salary" => "3000" ],
    ["id" => 3, "name" => "갑순이", "gender" => "F", "salary" => "10000" ],
    ["id" => 4, "name" => "갑돌이", "gender" => "M", "salary" => "8000" ]
 ];

foreach($arr as $key => $val) {
    if($val["salary"] >= "5000" && $val ["gender"] === "M") {
     echo $val["id"], $val["name"];
    }
}

// foreach($arr as $key => $val) {
//     if($key === 0);
// }
