@extends('layout.layout')    

@section('title', '로그인 페이지')

@section('bodyClassVh', 'vh-100')
    
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 400px;" action="{{ route('login') }}" method="post">
        @csrf
        {{-- 에러 메세지 출력 --}}
        {{-- any() : 에러 메세지가 있는지 없는지 확인 해주는 메소드 
                     있으면 true 없으면 false를 반환 --}}
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
            <input type="email" class="form-control" id="u_email" name="u_email">
        </div>
        <div class="mb-3">
            <label for="u_password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
        </div>
            <button type="submit" class="btn btn-dark w-100 mb-2">로그인</button>
            <a href="{{ route('regist') }}"><button type="button" class="btn btn-secondary w-100">회원가입</button></a>
        </form>
</main>
@endsection