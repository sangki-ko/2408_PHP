<?php
//  -----------------------
// 다른 파일의 소스코드를 사용하기 위해 불러오는 방법

// include : 잘 사용하지 않음 (중복 작성할 경우 여러 번 불러온다.)
// include_once : 일회용도로 한 번만 가져오기 위해 사용
// 공통점 : 오류 발생 시 프로그램을 정지하지 않고 처리함
// include_once("./070_include2.php");
// include_once("./070_include2.php");
// include_once("./070_include2.php");


// require : 잘 사용하지 않음 (중복 작성할 경우 여러 번 불러온다.)
// require_once : 일회용도로 한 번만 가져오기 위해 사용
// require 공통점 : 오류 발생 시 프로그램을 정리

require_once("./070_include2.php");
require_once("./070_include2.php");

echo "include 111111\n";



