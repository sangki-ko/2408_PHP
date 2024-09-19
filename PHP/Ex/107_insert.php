<?php

require_once("./my_db.php");

try {
    $conn = my_db_conn();
    
    // sql
    $sql =
        " INSERT INTO employees( "
       ."   name "
       ."   ,birth "
       ."   ,gender "
       ."   ,hire_at "
       ." ) "
       
       ." VALUES( "
       ."   :name "
       ."   ,:birth "
       ."   ,:gender "
       ."   ,DATE(NOW()) "
       ." ) "
       ;

       $arr_prepare = [
            "name"      => "최상기"
           ,"birth"     => "2002-01-04"
           ,"gender"    => "M"
       ];

       //transaction 시작
       $conn->beginTransaction();

       // 쿼리 준비
       $stmt = $conn->prepare($sql); 

       //쿼리 실행
       $exec_flg = $stmt->execute($arr_prepare);
       
       // 영향 받은 레코드 수를 반환
       $result_cnt = $stmt->rowCount();

       if(!$exec_flg) {
            throw new Exception("execute 예외 발생"); // 강제로 예외 발생
       } 
       
       // 영향 받은 레코드 수 이상
       if($result_cnt !== 1) {
            throw new Exception("레코드 수 이상");
       }

       // commit 처리
       $conn->commit();
}
// catch(Throwable $th)일 경우 $th에 Throwable 라는 클래스가 들어가게 된다. catch에서만 사용 가능하다.
catch(Throwable $th) {
    // PDO 인스터스화 됐는지 확인
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getCode()."".$th->getMessage();
}







