<?php
namespace Controllers;

use Models\BoardsCategory;

class Controller {    
    protected $arrErrorMsg = []; // 화면에 표시할 에러 메세지 리스트
    protected $arrBoardNameInfo = []; // 헤더 게시판 드롭 다운 리스트

    // 생성자

    public function __construct(string $action) {
        // 세션 시작 처리
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // 유저 로그인 및 권한 체크

        // 헤더 드롭 다운 리스트 획득
        $boardsCategoryModel = new BoardsCategory;
        $this->arrBoardNameInfo = $boardsCategoryModel->getBoardsNameList();

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