<?php

namespace PHP\OOP;

require_once("./Swim.php");
require_once("Pet.php");

use PHP\OOP\Swim;

// 연관성이 없지만 클래스들을 하나로 묶어서 추상메소드를 통해서 강제성으로 틀을 만들어주고 싶을 때 사용하는 것이
// 쓰는 것중에 가장 큰 이유 하나가 소스코드에 표준화 때문이다. 이와 같은 것이 소스코드를 표준화 한다고 한다.
// 인터페이스이다.

class GoldFish implements Swim, Pet {
    private $name = "금붕어";

    public function swimming() {
        return "수영한다잇";
    }

    public function printPet() {
        return "펫입니다.첨벙첨벙";
    }

}