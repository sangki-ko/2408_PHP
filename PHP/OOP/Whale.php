<?php
namespace PHP\OOP;

require_once("./Mammal.php");
require_once("./Swim.php");

use PHP\OOP\Mammal;
use PHP\OOP\Swim;

class Whale extends Mammal implements Swim {

    // 수영 메소드
    public function swimming() {
        return "수영 합니다.";
    }

    public function printInfo() {
        return "고래고래고래";
    }
}



