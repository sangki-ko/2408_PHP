<?php

// 변수 (Variable)
$dan = "최상기";

echo $dan." X 1 = 2\n";
echo "$dan X 2 = 4\n";
echo "$dan X 3 = 6\n";
echo "$dan X 4 = 8\n";
echo "$dan X 5 = 10\n";
echo "$dan X 6 = 12\n";
echo "$dan X 7 = 14\n";

// 변수 선언 
$num;

// 변수 초기화
$num = 1;

// 변수 선언 및 초기화
$str = "가나다";

// 변수명은 영문 대소문자, 숫자, 언더바(_) 사용 가능

// 네이밍 기법
// 스네이크 기법 (단어와 단어 사이에 _ 사용)
$user_name;

// 카멜 기법 (단어와 단어 사이에 첫 글자를 대문자로 사용)
$user_Name;

// ---------------
// 상수 (constants)
define("AGE", 20);
echo AGE;

// define("AGE", 20); : 이미 선언된 상수이므로 warning 처리가 일어나고, 값이 바뀌지 않는다.

$name = "최상기\n";
echo $name;
$name = "최상기\n";
echo $name;
$name = "최상기\n";
echo $name;
$name = "최상기\n";
echo $name;
$name = "최상기\n";
echo $name;
$name = "최상기\n";
echo $name;
$name = "고양이";
echo $name;

// underscore 표기법 (긴 숫자에 콤마 대신, 언더바로 넣어줘서 큰 숫자들을 쉽게 알아보기 위해 사용)
$num = 10_000_000;
echo $num."\n";

// 아래처럼 변수 값을 담아서 출력해 주세요.
$tang_money = " 8,000\n";
$jjajang_money = " 6,000\n";

echo "점심메뉴\n";
echo "탕수육", $tang_money;
echo "짜장면", $jjajang_money;
echo "짬뽕", $jjajang_money;

$menu = "점심메뉴\n";
$tang = "탕수육 8,000\n";
$zza = "짜장면 6,000\n";
$zzam = "짬뽕 6,000\n";

echo $menu, $tang, $zza, $zzam;

// 두 변수의 스왑
$num1 = 200;
$num2 = 10;
$tmp;

$tmp = $num1;
$num1 = $num2; // 
$num2 = $tmp;
echo $num1, $num2;

// --------------
// 데이터 타입
// --------------

// int : 정수
$num = 1;
var_dump($num);

// float, double : 실수
$double = 3.141592;
var_dump($double);

// string : 문자열
$str = "abc가나다";
var_dump($str);

// boolean : 논리값
$boo = true;
var_dump($boo);

// NULL : 널
$null = null;
var_dump($null);

// array : 배열
$arr = [1, 2, 3];
var_dump($arr);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환 (숫자를 문자열로 바뀌어주거나, 문자열을 숫자로 바꾸고 싶을 때 사용)
$casting = (string)$num;
var_dump($casting); 




