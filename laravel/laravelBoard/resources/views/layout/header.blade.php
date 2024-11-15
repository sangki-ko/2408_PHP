<header>
    <main>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">미니보드</a>
        {{-- 모든 로그인은 세션 기준으로 인식한다. --}}
        {{-- auth : 로그인이 됐을 때 화면에 출력할 코드 --}}
        @auth
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
                    <a href="{{ route('logout') }}" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
                </div>   
        @endauth
        @guest
        {{-- guest : 로그인이 되지 않았을 때 화면에 출력할 코드 --}}
        <a href="{{ route('regist') }}" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
        @endguest
        </div>
    </nav>
</header>