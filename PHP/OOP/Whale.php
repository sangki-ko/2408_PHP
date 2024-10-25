<?php
namespace PHP\OOP;

require_once("./Mammal.php");

use PHP\OOP\Mammal;

class Whale extends Mammal {
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

    // 수영 메소드
    public function swimming() {
        return "수영 합니다.";
    }
}



