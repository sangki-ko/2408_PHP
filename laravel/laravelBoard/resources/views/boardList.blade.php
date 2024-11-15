@extends('layout.layout')    

@section('title', '로그인 페이지')

@section('cssLink')
    <link rel="stylesheet" href="/css/free.css">
@endsection

@section('jsLink')
    <script src="/js/board.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
    
@section('main')
<div class="mt-5 mb-5 text-center">
    <h1 class="mb-4">자유게시판</h1>
    <a href="{{ route('boards.create') }}"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
      </svg></a>
  </div>
  <main>
  @foreach ($data as $item)
        <div class="card">
            <img src="{{ $item['b_img'] }}" class="card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $item['b_title'] }}</h5>
                    <p class="card-text">{{ $item['b_content'] }}</p>
                    <button value="{{ $item["b_id"] }}" type="button" class="btn btn-primary my-btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal">
                    상세
                    </button>
                </div>
        </div>
  @endforeach
</main>
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">개발자입니다.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalCreatedAt">2024-01-01 00:00:00</p>
                <p id="modalContent">살려주세요.</p>
                <br>
                <img id="modalImg" src="./img/농담1.jfif" alt="" class="object-fit-cover" style="width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            </div>
        </div>
    </div>
</div>
@endsection