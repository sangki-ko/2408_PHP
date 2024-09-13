<?php

// $i = random_int(1, 45);
for($rdm = 1; $rdm <= 6; $rdm++) {
    $i = random_int(1, 45);
    $i_2 = [0, 0, 0, 0, 0, 0];
    foreach($i_2 as $i => $val){
        echo $i_2;
    }
}

// for($x = $i; $x != $i;) {

// echo random_int(1, 45)


for($i = 1; $i <= 45; $i++) {
    $arr[$i = 1] = $i;
}

for($i = 0; $i <6; $i++) {
    $randow_num = random_int(0, 44);
    $random_pick = $arr[$random_num];

    $is_set_flg = false;

}


$rememberNum = [];
$isOverlap = false;
for($i = 0; $i< 6;){
  $num = random_int(1,45);
  $isOverlap = false;
  for($j = 0 ; $j < count($rememberNum); $j++)
  if($num === $rememberNum[$j]){
    $isOverlap = true;
    break;
  }
  if($isOverlap){
    continue;
  }
  $rememberNum[$i] = $num;
  echo $num."\n";
  $i ++;
}
