<?php
require_once("../Ex/my_db.php");

// 3명의 신규 사원 정보를 employees에 추가해야한다.

$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "1990-01-01", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

try {
    $conn = my_db_conn();

    $conn->beginTransaction();

    foreach($data as $item) {
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

    }


    $conn->commit();
}
catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}
