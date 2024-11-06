<?php

// 시간 설정을 무한으로도 할 수 있지만, 브라우저 쪽에서 막아두는 경우가 많다.
setcookie('test_cookie', '맛있다', time() + 3600);