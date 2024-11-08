<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index() {
        // -------------
        // 쿼리빌더
        // -------------

        // 쿼리 빌더를 이용하지 않고 SQL 작성
        // SELECT
        $result = DB::select('select * from users');
        $result = DB::select('select * from users where u_email = :u_email', ['u_email' => 'tkdrl13@damin.com']);
        $result = DB::select('select * from users where u_email = ?', ['tkdrl13@damin.com']);
        // result의 배열로 담긴 값을 사용할 때 쓰는 방법
        // $result[0]->u_id;

        // INSERT
        // DB::insert('insert into boards_category (bc_type, bc_name)
        // values(?, ?)', ['3', '테스트게시판']);

        // UPDATE
        // DB::update('update boards_category set bc_name = ? where bc_type = ?',
        //             ['미어캣 게시판', '3']);
        
        // DELETE
        // DB::delete('DELETE FROM boards_category where bc_type = ?'
        //             ,['3']);

        // ---------------
        // 쿼리 빌더 체이닝
        // ---------------
        // useres 테이블 모든 데이터 조회
        // 기본 유형 : select * from users;
        $result = DB::table('users')->get();

        var_dump($result);
        return 'asdasdasd';
    }
}
