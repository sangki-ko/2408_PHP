<?php 

// 설정 파일 불러오기
require_once('./config.php'); // 설정 파일 불러오기
require_once('./autoload.php'); // 오토로드 파일 불러오기

// 클래스를 인스턴스화 하면 자동으로 php가 감지를 해서 require_once를 자동화 시킬 수 있다.
new Route\Route(); // 라우터 호출


?>