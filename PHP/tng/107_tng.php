<?php

// 나의 급여를 2500만원으로 변경해주세요.

require_once("../Ex/my_db.php");

$conn = null;

try {
    // PDO class 인스턴스화
    $conn = my_db_conn();

    $conn->beginTransaction();

    $sql =  " UPDATE salaries "
            ." set "
            ."  updated_at = NOW()"
            ."  ,end_at = DATE(NOW())"
            ." WHERE "
            ." emp_id = :emp_id "
            ;
    $arr_prepare = [
        "emp_id" => 100015
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 반환

    if(!$result_flg) {
        throw new Exception(" update Query Error : salaries");
    }

    if($result_cnt !== 1) {
        throw new Exception(" update Count Error : salaries");

    }

    // 연봉 업데이트
    $sql =
    " INSERT INTO salaries( "
    ."   emp_id "
    ."   ,salary "
    ."   ,start_at "
    ." ) "
   
    ." VALUES( "
    ."   :emp_id "
    ."   ,:salary "
    ."   ,DATE(NOW()) "
    ." ) "
   ;

   $arr_prepare = [
        "emp_id"      => 100015
       ,"salary"     => 25_000_000
   ];

   // 쿼리 준비
   $stmt = $conn->prepare($sql); 

   //쿼리 실행
   $exec_flg = $stmt->execute($arr_prepare);
   
   // 영향 받은 레코드 수를 반환
   $result_cnt = $stmt->rowCount();

   if(!$exec_flg) {
        throw new Exception(" Insert Query Error : salaries"); // 강제로 예외 발생
   } 
   
   // 영향 받은 레코드 수 이상
   if($result_cnt !== 1) {
        throw new Exception(" Insert Count Error : employees");
   }

    $conn->commit();
}
    catch(Throwable $th) {
        if(!is_null($conn)) {
            $conn->rollBack();
        }
        echo $th->getMessage();
    }

