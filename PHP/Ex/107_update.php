<?php

require_once("./my_db.php");

$conn = null;

try {
    // PDO class 인스턴스화
    $conn = my_db_conn();

    $sql =  " UPDATE employees "
            ." set "
            ."   name = :name "
            ."  ,updated_at = NOW()"
            ." WHERE "
            ." emp_id = :emp_id "
            ;
    $arr_prepare = [
        "name" => "갑순이"
        ,"emp_id" => 100001
    ];
    $conn->beginTransaction();

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 반환

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }

    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 수 이상");
    }



    $conn->commit();
    


}
catch(Throwable $th){
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}