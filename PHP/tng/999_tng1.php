<?php

    // for($rdm = 2; $rdm <= 9; $rdm++) {
    //     echo "**** ".$rdm."단 ****\n";
    //     for($i = 1; $i <= 9; $i++) { 
    //         echo $rdm." X ".$i." = ".($rdm * $i)."\n";
    //     }
    // }


    // function my_sum(int $sum, int $sum2 = 10) {
    //     return $sum + $sum2;
    // }
    // echo my_sum(100);

    // ---------------------
    // 예외처리

    // try {
    //     echo "바깥쪽 try\n";
    //     5 / 0;

    //     try {
    //         echo "안쪽 try\n";
    //     }
    //     catch(Throwable $th) {
    //         echo "안쪽 catch\n";
    //     }
    // }
    // catch(Throwable $th) {
    //     // 예외 발생시 할 처리
    //     echo "바깥쪽 catch\n";
        
    // }

    // --------------
    // 강제 예외 발생

    // try {
    //     throw new Exception("강제예외 발생");
    // }
    // catch(Throwable $th) {
    //     echo $th->getMessage();
    // }
    

    // ---------------
    $num = 1;
    var_dump((string)$num);
