<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <form action="/home" method="post">
        @csrf
        <button type="submit">POST</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('delete')
       <button type="submit">delete</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('put')
        <button type="submit">put</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('patch')
        <button type="submit">patch</button>
    </form>
</body>
</html>