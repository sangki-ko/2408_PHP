<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // redirect()->route(이동할 주소의 이름);
    return redirect()->route('goLogin');
});

// 로그인 관련
Route::middleware('guest')->get('/login', [UserController::class, 'goLogin'])->name('goLogin');
Route::middleware('guest')->post('/login',  [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 회원가입 관련
Route::middleware('guest')->get('/regist', [UserController::class, 'regist'])->name('regist');
Route::middleware('guest')->post('/regist', [UserController::class, 'goRegist'])->name('goRegist');

// 게시판
// except(안 쓰는 것1, 안 쓰는 것2) : 안 쓰는 것들을 지정 해줘서 라우트가 실행이 안되게 함
// 이 처리가 실행되기 전과 후에 공통된 처리들을 처리하고 싶을 때 미들웨어를 사용
// 라라벨이 사전에 등록을 해뒀기 때문 / Kernel.php 파일에 등록을 해뒀다. 그래서 auth라는 이름으로 사용이 가능
// middleware = 전역에서 사용하는 미들웨어
// middlewareGroups = 각각의 라우트에서만 사용 가능한 미들웨어
// routemiddleware = 여러 라우트에서 공통적인 처리를 할 경우가 있다. 하면 만듬
// 로그인이 됐는지 안 됐는지 체크, 여러 체크들을 만들어놓고 사전에 체크를 하는 역할
Route::middleware('auth')->resource('/boards', BoardController::class)->except('update', 'edit');

// 게시판 작성 페이지
