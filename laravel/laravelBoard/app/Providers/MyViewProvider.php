<?php

namespace App\Providers;

use App\Models\BoardsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MyViewProvider extends ServiceProvider
{
     /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // * : 모든 뷰에서 실행을 할 것이다 라는 뜻
        // 특정 몇 개만 묶고 싶을 때 [] 배열 형태로 blade tampleat 명을 적어준다.
        // view : view를 랜더링 한 객체
        View::composer(['boardList', 'insert'], function($view) {
            $resultBoardCategoryInfo = BoardsCategory::orderBy('bc_type')->get();
            $view->with('myGlobalBoardsCategoryInfo', $resultBoardCategoryInfo);
        });
    }
}
