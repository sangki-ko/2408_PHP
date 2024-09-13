<?php

class Whale {
    // ---------------
    // 프로퍼티 :
    // 클래스 내의 우리가 선언하는 변수
    // 접근 제어 지시자 : public, private, protected
    // public : 클래스 내부, 외부 어디서든 접근 가능
    // private : 클래스 내부에서만 접근 가능하다.
    // protected : 클래스 내부 및 상속 관계에서 접근 가능(외부에서 접근 불가)
    public $name = "고래";
    private $age = 30;
    protected $gender;

    // 메소드(method) : class 안에 있는 함수
    function breath() {
        echo "숨을 쉽니다.";
    }

    // $this : class 내의 프로퍼티나 메소드에 접근하기 위해서 사용함
    function info() {
        echo "나이는".$this->age;
    }

    // static 메소드
    public static function myStatic() {
        echo "스태틱 메소드";
    }
    
}

