<?php

// if 문

$food = "";

if($food === "떡볶이") {
    echo "한식";
}
else if ($food === "짜장면") {
    echo "중식";
}
else if ($food === "햄버거") {
    echo "양식";
}

// switch 문

switch($food) {
    case "떡볶이":
        echo "한식";
        break; // break 생략 시 다음 처리도 계속 이어간다.
    case "짜장면":
        echo "중식";
        break;
    case "햄버거":
        echo "양식";
        break;
    default:
     echo "맛도리";
     break;
                
}

// 1등이면 금상, 2등이면 은상, 3등이면 동상, 그 외에는 

$rank = "1";

switch($rank) {
    case "1":
        echo "금상";
        break;
    case "2":
        echo "은상";
        break;
    case "3":
        echo "동상";
        break;
    case "4";
        echo "장려상";
        break;

    default:
     echo "노력상";
     break;
                
}