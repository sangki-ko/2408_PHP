<?php

//세션 시작 : 세션 시작 전에 출력 처리가 있으면 안 된다.
session_start();

$_SESSION['test_session'] = '세션1';