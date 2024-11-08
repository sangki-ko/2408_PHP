<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Rayout')</title>
</head>
<body>
    @include('layout.header')

    {{-- 부분 부분마다 yield를 불러와야 할 때는 yield를 많이 불러오겠다 --}}
    <main>
        @yield('main')
    </main>

    @section('show')
    <h2>부모 show 입니다.</h2>
    <h3>많은 처리</h3>
    @show

    @include('layout.footer')
</body>
</html>