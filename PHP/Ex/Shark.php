<?php


class Shark {
    public $name;
    // 생성자(construct)
    // 객체를 인스턴스화 할 때, 딱 한 번만 실행되는 메소드
    // $this : class (자신) 지역스코프를 다른 함수 안에 들어와서 쓸 때 사용

    public function __construct($name) {
        $this->name = $name;
        
    }
}