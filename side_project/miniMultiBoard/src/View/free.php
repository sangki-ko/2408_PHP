<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/free.css">
    <title>자유게시판</title>
</head>
<body>
    <header>
        <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">미니보드</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        게시판
                        </a>
                        <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">자유게시판</a></li>
                    <li><a class="dropdown-item" href="#">질문게시판</a></li>
                        </ul>
                </li>
                </ul>
                <a href="./login.html" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
            </div>
            </div>
        </nav>
    </header>

      <div class="mt-5 mb-5 text-center">
        <h1 class="mb-4">자유게시판</h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
          </svg>
      </div>

      <div class="card-grid">
        <div class="card">
            <img src="./img/농담1.jfif" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">담곰이</h5>
                    <p class="card-text">담곰</p>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal"
                    >
                       상세
                    </button>
                </div>
          </div>
          <div class="card">
            <img src="./img/농담2.jfif" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">쫄아있는 담곰이</h5>
                    <p class="card-text">쫄담곰</p>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal"
                    >
                       상세
                    </button>
                </div>
          </div>
          <div class="card">
            <img src="./img/농담3.jfif" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">화난 담곰이</h5>
                    <p class="card-text">화난담곰</p>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal"
                    >
                       상세
                    </button>
                </div>
          </div>
          <div class="card">
            <img src="./img/농담3.jfif" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">화난 담곰이</h5>
                    <p class="card-text">화난 담곰</p>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal"
                    >
                       상세
                    </button>
                </div>
          </div>
          <div class="card">
            <img src="./img/농담3.jfif" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">화난 담곰이</h5>
                    <p class="card-text">화난 담곰</p>
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal"
                    >
                       상세
                    </button>
                </div>
          </div>
      </div>

      <!-- footer -->
      <footer class="fixed-bottom bg-dark text-light text-center p-3" style="font-size: 20px;">저작권</footer> 
      
      <!-- Modal -->
          <div class="modal fade" id="detailModal" tabindex="-1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">개발자입니다.</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <p>살려주세요.</p>
                      <br>
                      <img src="./img/농담1.jfif" alt="" class="object-fit-cover" style="width: 100%;">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                      </div>
                  </div>
              </div>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>