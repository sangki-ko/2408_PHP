@extends('layout.layout')    

@section('title', '글작성 페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 400px;" action="{{ route('boards.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div id="errorMsg" class="form-text text-danger">
                {{-- all() : $errors의 담겨있는 에러 메세지들을 배열로써 가져오는 메소드 --}}
                @foreach ($errors->all() as $errorMsg)
                    <span>{{ $errorMsg }}</span>
                    <br>
                @endforeach
            </div>
            @endif
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
                <a href="{{ route('boards.index') }}"><button type="button" class="btn btn-secondary w-100">취소</button></a>
                <input type="hidden" name="bc_type" value="{{ $bcType }}">
          </form>
    </main>
@endsection