<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn = null;

    try{
        if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
            // GET 처리
            $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

            if($id < 1){
                throw new Exception("파라미터 오류");
            }

            // PDO Instance
            $conn = my_db_conn();

            // ---------------------
            // 데이터 조회
            // ---------------------

            $arr_prepare = [
                "id" => $id
            ];

            $result = my_board_select_id($conn, $arr_prepare);

        }else {
            $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
            
            if($id < 1) {
                throw new Exception("파라미터 오류");
            }

            // PDO instance
            $conn = my_db_conn();

            // 트렌젝션 시작
            $conn->beginTransaction();

            
            $arr_prepare = [
                "id" => $id
            ];
                
            my_board_delete($conn, $arr_prepare);

            $conn->commit();

            header("Location: /index.php?page=3");
            exit;

        }

    }
    catch(Throwable $th) {
        if(!is_null($conn)) {
            $conn->rollBack();
        }
        echo $th->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/delete.css">
    <title>삭제 페이지</title>
</head>
<body>
    <header>
        <h1>mini Board</h1>
    </header>
    <main>
        <form action="/delete.php" method="post">
            <input type="hidden" name="page" value="<?php echo $page ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">

        <div class="main-header">
                <p>삭제하면 영구적으로 복구할 수 없습니다.</p>
                <p>정말로 삭제하시겠습니까?</p>                
            </div>
        <div class="main-content">
            <div class="box">
                <div class="box-title">게시글 번호</div>
                <div class="box-content"><?php echo $result["id"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">제목</div>
                <div class="box-content"><?php echo $result["title"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">내용</div>
                <div class="box-content"><?php echo $result["content"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">작성일자</div>
                <div class="box-content">
                <?php echo $result["created_at"] ?></div>
            </div>
        </div>

                <div class="main-footer">
                        <button type="submit" class="btn-small">삭제</button></a>
                        <a href="/detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-small">취소</button></a>
                </div>
            </form>

    </main>
</body>
</html>

