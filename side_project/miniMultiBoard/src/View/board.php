<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="/View/css/free.css">
    <script src="View/Js/board.js" defer></script>
    <title>자유게시판</title>
</head>
<body>
    <?php require_once('View/inc/header.php') ?>

      <div class="mt-5 mb-5 text-center">
        <input type="hidden" id="inputBoardType" name="board_type" value="<?php  echo $this->boardType; ?>">
        <h1 class="mb-4"><?php echo $this->getBoardName(); ?></h1>
        <svg id="btnInsert" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
          </svg>
      </div>

      <div class="card-grid">
        <?php
            foreach($this->getArrBoardList() as $item) { ?>
            <div class="card">
                <img src="<?php echo $item['b_img'] ?>" class="card-img-top" style="height: 300px;" alt="...">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $item['b_title'] ?></h5>
                        <p class="card-text"><?php echo $item['b_content'] ?></p>
                        <button
                        value="<?php echo $item['b_id']; ?>"
                        type="button"
                        class="btn btn-primary my-btn-detail"
                        data-bs-toggle="modal"
                        data-bs-target="#detailModal">
                        상세
                        </button>
                    </div>
              </div>
        <?php } ?>  

      <!-- footer -->
      <footer class="fixed-bottom bg-dark text-light text-center p-3" style="font-size: 20px;">저작권</footer> 
      
      <!-- Modal -->
          <div class="modal fade" id="detailModal" tabindex="-1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="modal-title">개발자입니다.</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <p id="modal-name">미어캣</p>
                      <p id="modal-content">살려주세요.</p>
                      <br>
                      <img src="" class="object-fit-cover" id="modal-img" style="width: 100%;">
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