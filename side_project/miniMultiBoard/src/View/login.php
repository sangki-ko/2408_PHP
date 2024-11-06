<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>로그인</title>
</head>
<body class="vh-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">미니보드</a>
        </nav>
    </header>

    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 400px;" action="/login" method="POST">
            <?php require_once('View/inc/errorMsg.php'); ?>
            <div class="mb-3">
                <label for="u_email" class="form-label">이메일</label>
                <input type="email" class="form-control" id="u_emaild" name="u_email">
            </div>
            <div class="mb-3">
                <label for="u_password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_password" name="u_password">
            </div>
                <button type="submit" class="btn btn-dark w-100 mb-2">로그인</button>
                <a href="./membership.html"><button type="button" class="btn btn-secondary w-100">회원가입</button></a>
          </form>
    </main>

    <!-- footer -->
    <footer class="fixed-bottom bg-dark text-light text-center p-3" style="font-size: 20px;">저작권</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>