<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edu</title>
</head>
<body>
    <h1>이거는 보입니다.</h1>
    {{-- 블레이드 템플릿에 주석은 개발자 모드에서 보이지 않는다.
         되도록이면, 블레이드 템플릿 주석을 사용하자 --}}
    {{-- <h1>이거는 안 보입니다.</h1> --}}
    {{-- <h1>{{ $data['name'] }}</h1> --}}
    {{-- htmlspecialchars : 블레이드 템플릿과 똑같이 문자열로 인식할 수 있게 변환해준다. --}}
    <h1><?php echo htmlspecialchars($data['name']); ?></h1>
</body>
</html>