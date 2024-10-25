<?php
namespace PHP\OOP;

require_once("./Mammal.php");
require_once("./Swim.php");
require_once("./Pet.php");

// 추상화 :
// 공통적인 부분들을 추출해서 합치는 작업이 추상화 작업이다.

use PHP\OOP\Mammal;

class FlyingSquirrel extends Mammal implements Pet {
    
    // 비행 메소드
    public function flying() {
        return "날아다닙니다.";
    }

    // 오버라이딩
    // 부모가 가지고 있는 메소드를 자식 쪽에서 재정의해서 사용한다.
    // parent : 부모가 가지고 있는 메소드를 기지고 오고싶을 때 사용한다. 예) parent::method명();
    public function printInfo() {
        return "룰루랄라";
    }

    public function printPet() {
        return "펫입니다 찍찍";
    }
}