<?php
namespace Controllers;

class Controller {    
    // 생성자

    public function __construct(string $action) {
        // 세션 시작 처리
        
        // 유저 로그인 및 권한 체크

        // 해당 Action 호출
        // 여기서 Action : 해당 컨트롤러에 메소드를 말한다.
        $resultAction = $this->$action();

        // view 호출
        $this->callView($resultAction);
        // php 종료

        exit; // php 처리 종료
    }

    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);
        }else {
            require_once(_PATH_VIEW.'/'.$path);
        }
    }
}