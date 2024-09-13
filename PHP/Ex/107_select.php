<?php

require_once("./my_db.php");

try {
    5 / 0;
    // 메소드
    $conn = my_db_conn();
    $i = 45;
    // prepared Statement
    $sql = " SELECT " 
    ."   *   "
    ." FROM employees "
    
    ." WHERE "
    ." emp_id = :emp_id "
    ;
    
    $arr_prepare = [
        "emp_id" => $i
    ];
    
    $stmt = $conn->prepare($sql); // DB 질의 준비
    
    $stmt->execute($arr_prepare); // 질의 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치
    
    print_r($result);
} 
catch(Throwable $th){
    echo $th->getMessage(); // 예외 메세지 출력
}
    
