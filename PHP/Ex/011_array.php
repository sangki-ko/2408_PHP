<?php

// 배열(Array) : 하나의 변수에 여러 개의 값을 담을 수 있는 데이터 타입 

// 배열 선언

$arr = ["최", "상", "기", 1];

// 5.3버전 이하에서의 배열 선언
// $arr2 = array();

// 배열에서 특정 요소 접근
echo $arr["최"];

// 배열에서 특정 요소 변경
$arr[2] = "최";

var_dump($arr);

$arr[0] = "안녕하세요";

var_dump($arr);

// ---------------
// 연관배열 : 사용자가 할당한 키를 사용하는 배열

$arr2 = [
    "3" => 5000
    ,"4" => 3000
    ,"key3" => 100000
    ,"key4" => 1000000000000000
];

echo $arr2["key2"];

$arr2 ["key5"] = "고릴라";
var_dump($arr2);

// -------------------------
// 다차원 배열
// --------------------------

$arr3 = [
    [1, 2, 3]
    ,[4, 5, 6]
    ,[7, 8, 9]
];

// 다차원 배열의 예
$result2 = [
    "홍길동" => [
        "id" => 10001
        ,"name" => [
            "side_name"
        ]
    ]
    ,[
        "id" => 10002
        ,"name" => "김철수"
    ]
    ,[
        "id" => 10003
        ,"name" => "김영일"
    ]
];

echo $arr3 ["홍길동"]["name"]["side_name"];

// 배열에서 자주 사용하는 함수
// count() : 배열의 요소의 개수를 반환하는 함수
$arr4 = [5, 67, 2, 3, 3, 4, 6, 8];
echo count($arr4);

// unset() : 해당 키의 요소를 삭제
unset($arr4[1]);

var_dump($arr4);

// 배열의 정렬 함수
asort($arr4); // 오름차순 정렬
var_dump($arr4);

arsort($arr4);
var_dump($arr4); // 내림차순 정렬

ksort($arr4);
var_dump($arr4);


// 키 오름차순 정렬

$arr5 = [
    "d" => "1"
    ,"a" => "2"
    ,"c" => "3"
    ,"b" => "4"
];

ksort($arr5); //key 기준으로 오름차순 정렬
var_dump($arr5);

krsort($arr5); // ket 기준으로 내림차순 정렬
var_dump($arr5);

echo $arr["최"];