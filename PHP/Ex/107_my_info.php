<?php

// 나의 사원 정보를 입력(급여, 직급, 부서 정보 포함)

require_once("./my_db.php");

$conn = null;

try {
    // 데이터 베이스 연결
    $conn = my_db_conn();

    //트렌젝션 시작
    $conn->beginTransaction();

    // 사원테이블 insert
    $sql = 
        " INSERT INTO employees ( ".
        " name ".
        " ,birth ".
        " ,gender ".
        " ,hire_at ".
        " ) "


       ." VALUES ( "
       ." :name "
       ." ,:birth "
       ." ,:gender "
       ." ,DATE(NOW()) "
       ." ) "
    ;

    $arr_prepare = [
        "name"      => "상기최"
        ,"birth"     => "2002-01-04"
        ,"gender"    => "남"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception(" Insert Query Error : employees");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error : employees");       
    }

    // insert 한 pk 획득
    $emp_id = $conn->lastInsertId();
    // echo $emp_id;

    // ------------------
    // 급여 테이블 insert

    $sql = 
        " INSERT INTO salaries( "
        ."      emp_id "
        ."      ,salary "
        ."      ,start_at "
        ." ) "

        ." VALUES ( "
        ."      :emp_id "
        ."      ,:salary "
        ."      ,DATE(NOW()) "
        ." ) "
    ;

    $arr_prepare = [
        "emp_id" => $emp_id
        ,"salary" => 1000000000000000000

    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향 받은 레코드 수 획득
    
    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception("Insert Query Error : salaries");
    }

    // 영향 받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert Count Error : salaries");
    }


    // -----------------
    // 부서테이블 insert
    $sql = 
        " INSERT INTO department_emps ( "
        ." emp_id "
        ." ,dept_code "
        ." ,start_at "
        ." ) "


        ." VALUES ( "
        ." :emp_id "
        ." ,:dept_code "
        ." ,DATE(NOW()) "
        ." ) "
    ;

    $arr_prepare = [
        "emp_id"      => $emp_id
        ,"dept_code"  => "D006"
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득

    // 쿼리 실행 예외 처리
    if(!$result_flg) {
        throw new Exception(" Insert Query Error : department_epms");
    }

    // 영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("Insert count Error : department_epms");       
    }

    // -----------------
    // 직급테이블 insert
    $sql = 
    " INSERT INTO title_emps ( "
    ." emp_id "
    ." ,title_code "
    ." ,start_at "
    ." ) "


    ." VALUES ( "
    ." :emp_id "
    ." ,:title_code "
    ." ,DATE(NOW()) "
    ." ) "
;

$arr_prepare = [
    "emp_id"      => $emp_id
    ,"title_code" => "T009"
];

$stmt = $conn->prepare($sql); // 쿼리 준비
$result_flg = $stmt->execute($arr_prepare); // 쿼리 실행
$result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득

// 쿼리 실행 예외 처리
if(!$result_flg) {
    throw new Exception(" Insert Query Error : title_code");
}

// 영향받은 레코드 수 예외 처리
if($result_cnt !== 1) {
    throw new Exception("Insert count Error : title_code");       
}

    // 커밋
    $conn->commit();
}
catch(Throwable $tr) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $tr->getMessage();
}

