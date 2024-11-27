<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 자동으로 path에 /api가 붙게됨 (api.php 파일 한정)
// from request : 자동으로 컨트롤러에 오기전에 문제가 있으면  
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::middleware('my.auth')->post('/logout', [AuthController::class, 'logout'])->name('post.logout');

// 인증이 필요한 라우트 그룹
Route::middleware('my.auth')->group(function() {
    // 인증 관련
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // 게시글 관련
    Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');
    Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');
});
