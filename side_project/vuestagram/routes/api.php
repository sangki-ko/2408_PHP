<?php

use App\Http\Controllers\AuthController;
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
Route::post('/login', [AuthController::class, 'login'])->name('post.login');
