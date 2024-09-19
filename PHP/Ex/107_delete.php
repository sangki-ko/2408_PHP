<?php

require_once("./my_db.php");

$conn = null;

try {
    // PDO 획득
    $conn = my_db_conn();

    // 트랜잭션 시작
    $conn->beginTransaction();

    // sql
    $sql = " DELETE FROM employees "
          ." WHERE "
          ."    emp_id = :emp_id" 
        ;

    $arr_prepare = [
            "emp_id" => 100001
        ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cut = $stmt->rowCount(); // 영향 받은 레코드의 수

        if(!$result_flg) {
            throw new Exception("쿼리 실행 에외 발생");
        }

        if($result_cut > 1) {
            throw new Exception("삭제 레코드 수 이상");
        }

    $conn->commit();
}

catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}