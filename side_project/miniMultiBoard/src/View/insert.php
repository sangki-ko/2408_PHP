<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>로그인</title>
</head>
<body class="vh-100">
    <?php require_once('View/inc/header.php') ?>

    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 400px;" action="/boards/insert" method="POST" enctype="multipart/form-data">
            <?php require_once('View/inc/errorMsg.php'); ?>
            <div class="mb-3">
                <label for="b_title" class="form-label">제목</label>
                <input type="text" class="form-control" id="b_title" name="b_title" required>
            </div>
            <div class="mb-3">
                <label for="b_content" class="form-label">내용</label>
                <input type="text" class="form-control" id="b_content" name="b_content" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">이미지</label>
                <input type="file" name="file" required>
            </div>
                <button type="submit" class="btn btn-dark w-100 mb-2">작성</button>
                <a href="/boards"><button type="button" class="btn btn-secondary w-100">취소</button></a>
          </form>
    </main>

    <!-- footer -->
    <footer class="fixed-bottom bg-dark text-light text-center p-3" style="font-size: 20px;">저작권</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>