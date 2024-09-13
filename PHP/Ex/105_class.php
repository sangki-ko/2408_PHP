<?php 
// // class : 동종의 객체들을 모아 정의한 것
// // 관습적으로 파일명과 클래스명을 동일하게 지어준다.
require_once("./Whale.php");

// // 인스턴스화 : 클래스를 메모리에 직접적으로 올리는 행위
// // 클래스가 하나의 객체가 된다. 클래스는 메모리에 직접적으로 올리는 행위를 해줘야한다.

$whale = new Whale();

// Class의 메소드 사용 방법
$whale->breath();

// 프로퍼티 접근(접근할 때 $ 제거 해야한다.)
echo $whale->name; 
echo $whale->info();

// 스태틱 멤버에 접근

Whale::myStatic();


require_once("./Shark.php");

// 상어클래스
$shark = new Shark("상어");
echo $shark->name;