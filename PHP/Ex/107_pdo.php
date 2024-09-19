<?php

// // ----------------
// // PDO Class : DB 엑세스 방법 중 하나 
// //             (많이 사용하고 있음)

// // DB 접속 정보
// $my_host = "localhost"; // DB Host
// $my_user = "root"; // DB 계정명
// $my_password = "php504"; // DB 계정 비밀번호
// $my_db_name = "dbsample"; // 접속할 DB명
// $my_charset = "utf8mb4"; // DB Charset

// $my_dsn = "mysql:host=".$my_host.";dbname=".$my_db_name.";charset=".$my_charset; // DSN : 데이터 소스 네임에 약자 데이터베이스에 접속하기 위한 문자열

// // PDO 옵션 설정
// $my_otp = [
//     // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 애뮬레이션 할지 여부를 결정
//     PDO::ATTR_EMULATE_PREPARES          => false // DB에서 애뮬레이션 하도록 설정
//     // PDD에서 예외를 처리하는 방식을 지정
//     ,PDO::ATTR_ERRMODE                  => PDO::ERRMODE_EXCEPTION
//     // DB의 결과를 fetch하는 방식을 지정
//     ,PDO::ATTR_DEFAULT_FETCH_MODE       => PDO::FETCH_ASSOC // 연관배열로 fetch
// ];

// // DB 접속
// $conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);

// // select
// $sql = "SELECT *
//         FROM 
//         employees
//         ORDER BY emp_id ASC
//         LIMIT 5"
// ;

// $stmt = $conn->query($sql); // PDO::query() : 쿼리 준비+ 실행
// $result = $stmt->fetchAll(); // 질의 결과를 패치

// // print_r($result);

// // 사번과 이름만 출력
// foreach($result as $item) {
//     echo $item["emp_id"]." ".$item["name"]."\n";
// }

// DB 정보
$my_host = "localhost"; // 호스트 name
$my_port = "3306";  // 포트 번호
$my_user = "root";  // 유저 name
$my_password = "php504"; // DB password
$my_db_name = "dbsample"; // DB name
$my_charset = "utf8mb4"; // charset : 컴퓨터가 글자를 인식하는 방식이 굉장히 많다. 그 중에 하나
// 컴퓨터가 글자를 어떻게 인식할거냐를 선택하는 방식


// DSN
$my_dsn = "mysql:host=".$my_host.
          ";port=".$my_port.    
          ";dbname=".$my_db_name.
          ";charset=".$my_charset;

// PDO option
$my_option = [
    // Prepared Statement의 애뮬레이션 설정
    PDO::ATTR_EMULATE_PREPARES    => false
    // PHP 쪽이 아니라 데이터베이스 쪽에서 애뮬레이션을 하겠다 라고 해서 false 값을 넣음

    // 예외 발생 시, 예외 처리 방법 설정
    ,PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION

    // Fetch 할 때 데이터 타입 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

// PDO Class 인스턴스 (인스턴스화 : 클래스를 메모리에 직접적으로 올리는 행위)
// PDO는 클래스로 분류 되므로 인스턴스화를 해줘야한다.
$conn = new PDO($my_dsn, $my_user, $my_password, $my_option);

// // select
// $sql = " SELECT "
//       ."      * "
//       ." FROM "
//       ."      employees "
//       ." LIMIT 3 "
//       ;

// $stmt = $conn->query($sql); // 쿼리 실행
// $result = $stmt->fetchAll(); // 결과를 Fetch

// print_r($result);


//select 예제
$sql = " SELECT "
      ."    * "
      ." FROM "
      ."    employees "
      ." WHERE "
      ."    emp_id = :emp_id1"
      ." OR "
      ."    emp_id = :emp_id2"
      ;

$prepare = [
    "emp_id1" => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn->prepare($sql); // 쿼리 준비
// prepare 메소드를 통해서 쿼리 준비를 해준 뒤
$stmt->execute($prepare); // 쿼리 실행
// execute 메소드를 통해 쿼리가 실행된다.
$result = $stmt->fetchAll();
// 결과 fetch

print_r ($result);