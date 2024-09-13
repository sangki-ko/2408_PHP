<?php

// PHP 내장 함수

// -------------------
// trim(문자열) : 문자열의 좌, 우 공백을 제거해서 반환

$str = "    최상기     ";

echo trim($str);
echo "\n";

// -------------------------
// strtoupper(문자열), strtolower(문자열) : 문자열을 대문자 혹은 소문자로 변환해서 반환

$str2 = "AQlsAX";

echo strtoupper($str2);
echo strtolower($str2);

echo "\n";

// -------------------
// mb_strlen(문자열) : 문자열의 길이를 반환, 멀티 바이트 문자열에 대응

$str3 = "최상기";

echo strlen($str3);

echo mb_strlen($str3);

echo "\n";
echo "\n";

// mb_strlen : 의 mb는 multi byte를 뜻한다.

// ----------------------------
// str_replace(치환할 문자열, 치환될 문자열, 검색하고 치환할 변수명) : 특정 문자를 치환해서 반환
     //  (특정 문자를 바꾸어서 반환)
$str4 = "key: 4kra3sdzxc12312";
echo str_replace("kr", "", $str4);
echo "\n";
echo "\n";
// str_replace(바뀔 문자열, 바꿀 문자열, 변수명) : 특정 문자를 치환해서 반환

// ---------------------
// mb_substr(대상문자열, 자를 개수, 출력할 개수) : 문자열을 잘라서 반환

$str5 = "PHP입니다.";
echo mb_substr($str5, 3, 2)."\n"; // 좌측 기준으로 잘린다.
echo mb_substr($str5, -4, 4); // 우측 기준으로 잘린다.

echo "\n";

// ----------------------------
// mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열의 특정 위치를 반환

$str6 = "점심 뭐먹지?";

echo mb_strpos($str6, "뭐")."\n";

// "뭐"부터 3글자를 잘라오기
echo mb_substr($str6, mb_strpos($str6, "뭐"), 3);
echo "\n";

// -----------------------------
// sprintf(포멧문자열, 대입문자열1, 대입문자열2 ......) : 포맷 문자열에 대입 문자열들을 순서대로 대입해서 반환하는 함수
// (작성한 순서대로 들어감)

$str_format = "당신의 점수는 %d점입니다. <%s>";
echo sprintf($str_format, 90, "A");

echo "\n";
// ---------------------------------
// isset(변수) : 변수가 설정이 되어 있는지 확인하여 true/false로 반환

$str7 = "";
$str8 = null;
var_dump(isset($str7));
var_dump(isset($str8));
var_dump(isset($no));

echo "\n";

// ----------------------
// empty(변수) : 변수의 값이 비어있는지 확인해서 true/false 반환
$empty1 = "abc";
$empty2 = "";
$empty3 = 0;
$empty4 = [];
$empty5 = null;

var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));

echo "\n";

// ---------------------------
// is_null(변수) : 변수가 null인지 아닌지 확인하여 true/false를 반환

$chk_null = null;
var_dump(is_null($chk_null));
echo "\n";

// ----------------------------
// gettype(변수) : 변수의 데이터 타입을 문자열로 반환

$type1 = "abc";
$type2 = 100;
$type3 = 1.2;
$type4 = [];
$type5 = true;
$type6 = null;
$type7 = new datetime();

echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";

echo "\n";

// -------------------------
// settype(변수, 데이터타입) : 변수의 데이터 타입을 변경해서 반환

$type8 = "1";

// var_dump((int)$type8); : 원본은 변경하지 않고, 캐스팅
settype($type8, "int"); // 원본의 데이터 타입을 변환
var_dump($type8);

echo "\n";

// ------------------------------
// time() : 현재 시간을 반환 (타임 스탬프에 초단위까지)

echo time();

echo "\n";

// ------------------------------
// date(시간포맷, 타임스탬프값) : 시간 포맷 형식으로 문자열을 반환
echo date("Y-m-d H:i:s", time());

echo "\n";

// --------------------------------
// ceil(변수), round(변수), floor(변수) : 각각 올림, 반올림, 버림하여 반환

$a = 10.9999999999;

echo ceil($a);
echo round($a);
echo floor($a);


// ------------------------
// random_int(시작값, 끝값) : 시작 값부터 끝 값까지의 랜덤한 숫자를 반환

echo random_int(1, 10000);








