<?php

// namespace
// 파일에 경로를 설정해서 어느 경로에 있는 무슨 파일을 쓰겠다 라는 뜻


namespace PHP\OOP;

class Mammal {
    private $name;
    private $residence;

    // 생성자
    public function __construct($name, $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    // 정보 출력
    // final : 자식 쪽에서 오버라이드를 할 수 없게 만들 수 있다. final public function printInfo()와 같이 메소드 명 앞에 붙여준다.
    public function printInfo() {
        return $this->name."가 ".$this->residence."에 삽니다.";
    }
}