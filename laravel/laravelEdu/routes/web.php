<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --------------
// 라우트 정의
// --------------

Route::get('/hi', function() {
    return '안녕하세요';
});

Route::get('/myview', function() {
    return view('myView');
});

// -----------
// httpMethod에 대응하는 라우터
// -----------

Route::get('/home', function() {
    return view('Home');
});
Route::post('/home', function() {
    return  'HOME POST';
});
Route::put('/home', function() {
    return  'home put';
});
Route::delete('/home', function() {
    return  'home delete';
});
Route::patch('/home', function() {
    return  'home patch';
});

// --------------------
// Route 파라미터 제어
// --------------------
Route::get('/param', function(Request $request) {
    return 'ID : '.$request->id.'NAME : '.$request->name;
});

// 세그먼트 파라미터
// http://localhost:8000/param/1
Route::get('/param/{id}', function($param, $id) {
    return $param.$id;
});
Route::get('/param/{id}', function(Request $request) {
    return $request->id;
});
Route::get('/param2/{id}', function(Request $request, $id) {
    return $request->id."  ".$id;
});

// 세그먼트 파라미터의 디폴트 설정, 중복된 경로의 라우트가 설정 되지 않도록 주의
Route::get('/param3', function() {
    return '파람3이다.';
});
Route::get('/param3/{id?}', function($id = 0) {
    return $id;
});

// -------------------
// 라우트 명 지정
// -------------------

Route::get('/name', function() {
    return view('Name');
});

Route::get('/home/na/hon/php', function() {
    return '좀 긴 패스';
})->name('long');

// -----------------
// 뷰에 데이터를 전달
// -----------------
Route::get('/send', function() {
    $result = [
        ['id' => 1, 'name' => '홍길동']
        ,['id' => 2, 'name' => '갑순이']
    ];

    // return view('send')->with('gender', '무성')->with('data', $result);
    return view('send')
            ->with('data', $result);
            // ->with([
            //     'gender' => '무성'
            //     ,'data' => $result
            // ]);
});

// --------------
// 대체 라우트
// --------------

Route::fallback(function() {
    return '오류여';
});

// ---------------
// 라우트 그룹
// --------------
Route::get('/users', function() {
    return 'GET : /users';
});
Route::post('/users', function() {
    return 'POST : /users';
});
Route::put('/users/{id}', function() {
    return 'PUT : /users';
});
Route::delete('/users/{id}', function() {
    return 'DELETE : /users';
});

Route::prefix('/users')->group(function() {
    Route::get('/', function() {
        return 'GET : /users';
    });
    Route::post('/', function() {
        return 'POST : /users';
    });
    Route::put('/{id}', function() {
        return 'PUT : /users';
    });
    Route::delete('/{id}', function() {
        return 'DELETE : /users';
    });
});