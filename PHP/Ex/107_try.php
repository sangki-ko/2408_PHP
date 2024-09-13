<?php

try {
    echo "try문 시작";
    // 예외나 에러가 발생할 가능성이 있는 소스코드를 작성
    5 /0;

    echo "try문 시작";
}
catch(Throwable $th) {
    // try 문에서 예외나 에러가 발생했을 때 실행할 소스코드를 작성
    echo "catch 예외발생";
}