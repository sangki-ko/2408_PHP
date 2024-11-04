<?php

// 인스턴스화가 되기 전에 먼저 실행이 되는 함수
// Route\Route 경로가 오게 된다.
// $path의 값이 Route\Route로 오게 된다.
spl_autoload_register(function($path) {
    require_once(str_replace('\\', '/', $path).'.php');
});