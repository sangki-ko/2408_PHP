<?php

use function PHPSTORM_META\type;

require_once("../Ex/my_db.php");

// 3명의 신규 사원 정보를 employees에 추가해야한다.
// 성공한 건 삽입되고, 실패한 것만 데이터베이스에 안 들어가게

$data = [
    ["name"  => "둘리", "birth"   => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "ㅁㄴㅇㅁ", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

// 복수의 데이터 루프

try {
    $conn = my_db_conn();

    foreach($data as $item) {
        try {
            // Transaction 시작
            $conn->beginTransaction();

            // --------------------
            // 새로운 사원 정보 삽입
            $sql = 
            " INSERT INTO employees ( "
            ."      name "
            ."      ,birth "
            ."      ,gender "
            ."      ,hire_at "
            ." ) "
            
            ." VALUES ( "
            ."      :name "
            ."      ,:birth "
            ."      ,:gender "
            ."      ,DATE(NOW()) "
            ." ) "
        ;

        $arr_prepare = [
            "name" => $item["name"]
            ,"birth" => $item["birth"]
            ,"gender" => $item["gender"]
        ];

            $stmt = $conn->prepare($sql);
            $result_flg = $stmt->execute($arr_prepare);

            if(!$result_flg) {
                throw new Exception("Insert exec Error : employees");
            }

            if($stmt->rowCount() !== 1) {
                throw new Exception("Insert exec Error : employees");
            }

            // commit
            $conn->commit();

        }
        catch(Throwable $th) {
            if(!is_null($conn)) {
                $conn->rollBack();
            }
            echo "안쪽 try문".$th->getMessage();
        }
    }
}
catch(Throwable $th) {
    echo "바깥 쪽 try문".$th->getMessage();
}

