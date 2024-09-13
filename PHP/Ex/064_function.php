<?php

// 두 수를 전달해주면 합을 반환해주는 함수
// 험수를 전달할 때

function my_sum($num1, $num2) {
    return $num1 + $num2;
}

echo my_sum(3, 100)."\n";
// 함수 호출
// 함수를 호출할 때 전달해주는 값을 아규먼트라고한다. 한국어로 인수

function my_sum2($num3, $num4) {
    return $num3 - $num4;
}

echo my_sum2(12354895, 5322356412)."\n";

function my_sum3($num5, $num6) {
    return $num5 * $num6;
}

echo my_sum3(523156, 52321)."\n";

function my_sum4($num7, $num8) {
    return $num7 / $num8;
}

echo my_sum4(5632, 5)."\n";

function my_minus($num9, $num10) {
    return $num9 % $num10;
}

echo my_minus(562313216, 9)."\n";


// --------------------
// 가변 길이 아규먼트
// 전달되는 모든 숫자를 더해서 반환 
// ... 을 이용하는 방법은 (** 주의 : pho5.6 이상에서 사용가능)

$arr = [
    [],
    ["id" => 2, "name" => "홍길동", "gender" => "M", "salary" => "3000" ],
    ["id" => 3, "name" => "갑순이", "gender" => "F", "salary" => "10000" ],
    ["id" => 4, "name" => "갑돌이", "gender" => "M", "salary" => "8000" ]
 ];

function my_sum_all(...$numbers) {
    
}

echo my_sum_all(random_int(1, 45), random_int(1, 45));



