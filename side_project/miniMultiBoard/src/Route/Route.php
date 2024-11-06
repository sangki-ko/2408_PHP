<?php

namespace Route;

use Controllers\BoardController;
use Controllers\UserController;

// 라우트 : 유저의 요청을 분석해서 해당 Controller로 연결 해주는 클래스
class Route {
    // 생성자
    public function __construct() {

        $url = $_GET['url']; // 요청 경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // HTTP 메소드 획득

        // 요청 경로를 체크
        if($url === 'login') {
            // localhost/login으로 오는데, GET으로 오는지 POST로 오는지에 따라서 처리하는 경로가다름
            // 회원 로그인 관련
            if($httpMethod === 'GET') {
                new UserController('goLogin');
            }else if($httpMethod === 'POST') {
                new UserController('login');
            }
        }else if($url === 'boards') {
            if($httpMethod === 'GET') {
                new BoardController('index');
            }else if($httpMethod === 'POST') {
                
            }
        }
    }
}