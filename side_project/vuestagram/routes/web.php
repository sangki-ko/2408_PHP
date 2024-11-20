<?php

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

// /{any} : 라라벨에 어떠한 path로 들어오더라도 리턴 라우터가 실행이 된다.
Route::get('/{any}', function () {
    return view('welcome');
    // where ('any', '.*') : 어떠한 경로로 들어와도 라우터로 보낸다
})->where('any', '.*');
