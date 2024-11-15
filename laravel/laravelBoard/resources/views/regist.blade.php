@extends('layout.layout')    

@section('title', '회원가입 페이지')

@section('bodyClassVh', 'vh-100')
    
@section('main')
    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 400px;" action="{{ route('goRegist') }}" method="post">
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
                <label for="u_email" class="form-label">아이디</label>
                <input type="email" class="form-control" id="u_email" name="u_email" value="{{ old('u_email') }}">
            <div class="mb-3">
                <label for="u_password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_password" name="u_password">
            </div>
            <div class="mb-3">
                <label for="verifyPassword" class="form-label">비밀번호 확인</label>
                <input type="password" class="form-control" id="verifyPassword" name="verifyPassword">
            </div>
            <div class="mb-3">
                <label for="u_name" class="form-label">이름</label>
                <input type="text" class="form-control" id="u_name" name="u_name" value="{{ old('u_name') }}">
            </div>
                <button type="submit" class="btn btn-dark w-100 mb-2">완료</button>
                <a href="{{ route('goLogin') }}"><button type="button" class="btn btn-secondary w-100">취소</button></a>
          </form>
    </main>
@endsection