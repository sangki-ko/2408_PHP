<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- asset : vue 프로젝트 같은 경우는 브라우저에서는 리소시즈에 접근이 안 돼서 vue.js로 프론트를 구성하는데, 
                최초에 파일을 불러오기 위해 사용 --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Vuestagram</title>
</head>
<body>
    <div id="app">
        {{-- 블레이드 파일에선 단어와 단어 사이 -(하이픈)을 추가해서 적어줘야한다. 
             문법이다.    --}}
        <App-Component></App-Component>
    </div>
</body>
</html>