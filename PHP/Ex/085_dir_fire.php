<?php

// ---------------------
// 디렉토리 생성
// ---------------------

// $mkdir_result = mkdir("./my_dir");
// if($mkdir_result) {
//     // 정상일 경우 처리

// }
// else {
//     // 실패일 경우 처리
// }

// -----------------------
// 디렉토리 존재 유무 체크
// -----------------------

// $chk_result = is_dir("./my_dir");
// if($chk_result) {
//     echo "있다.";
// }
// else {
//     echo "없다.";
// }

// ----------------------
// 디렉토리 열기 및 읽기
// ---------------------
// $open_result = opendir("./my_dir"); // 디렉토리 열기

// 디렉토리 읽기
// while($item = readdir($open_result)) {
//     echo $item."\n";
// }

// -------------
// 디렉토리 닫기
// -------------

// 열고 닫아주는 것까지 해야 함 * 잊으면 안됨 *
// closedir($open_result);

// -------------
// 디렉토리 삭제
// -------------

// rmdir("./my_dir");

// ----------------
// 파일 열기
// $file = fopen("./my_dir/text.txt", "a");
// if($file) {
//     // 파일열기 성공 시 처리
//     fwrite($file, "만두"."\n"); // 파일에 쓰기
// }
// else {
//     // 파일열기 실패 시 처리
//     echo "파일 열기 실패";
// }

// ----------------------
// 파일 닫기
// --------------
// fclose($file);

// -----------
// 파일 삭제
// -----------

unlink("./my_dir/text.txt");




