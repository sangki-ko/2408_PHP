<?php
namespace PHP\OOP;

require_once("./Mammal.php");

// 추상화 :
// 공통적인 부분들을 추출해서 합치는 작업이 추상화 작업이다.

class FlyingSquirrel extends Mammal {
    // private $name;
    // private $residence;

    // // 생성자
    // public function __construct($name, $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }

    // // 정보 출력
    // public function printInfo() {
    //     return $this->name."가".$this->residence."에 삽니다.";
    // }

    // 비행 메소드
    public function flying() {
        return "날아다닙니다.";
    }

    // 오버라이딩
    // 부모가 가지고 있는 메소드를 자식 쪽에서 재정의해서 사용한다.
    public function printInfo() {
        // parent : 부모가 가지고 있는 메소드를 기지고 오고싶을 때 사용한다. 예) parent::method명();
        return parent::printInfo()."룰루랄라";
    }
}