<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // public $result = '라라라';

    public function index() {
        $result = '홍길동';

        return view('test')
                ->with('name', $result);
    }
}




