<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class QueryController extends Controller
{
    public function index(Request $request) {
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
        $result = DB::table('users')->get(); // get() : 쿼리 실행 메소드

        // select * from users where name = ?, ['관리자']
        $result = DB::table('users')->where('u_name', '=', '관리자')->get();

        // select * from boards where bc_type = ? and b_id = < ?, ['0', 5]
        $result = DB::table('boards')
                        ->where('bc_type', '=', '0')
                        ->where('b_id', '<', 30)
                        ->get();

        // select * from boards where bc_type = ? or b_id = < ?, ['0', 30]
        $result = DB::table('boards')
                        ->where('bc_type', '=', '0')
                        ->orWhere('b_id', '<', 10) // or로 연결을 해줄 땐 orWhere 메소드를 사용해야한다
                        ->get();

        // select b_title, b_content from boards where b_id in (?, ?) [1, 2]
        $result = DB::table('boards')
                        ->select('b_title', 'b_content')
                        ->whereIn('b_id', [25, 26])
                        ->get();
                        
        // select * from boards where deleted_at is null
        $result = DB::table('boards')
                        ->whereNull('deleted_at')
                        ->get();

        // secelt * from users where year(created_at) = ? ['2024']
        // select * from users 
            // where created_at >= '2024-01-01 00:00:00'
            // and created_at <= '2024-12-31 23:59:59'
            // 위와 같은 쿼리문으로도 찾아볼 수 있다.
        $result = DB::table('users')
                            ->whereYear('created_at', '=', '2024')
                            ->get(); // dd : dumpdie의 약자 쿼리문과 데이터를 볼 수 있다.

        
        // 게시판별 게시글 개수
        // SELECT  bc_type, COUNT(*) cnt FROM boards GROUP BY  bc_type;
        $result = DB::table('boards')
                        ->select('bc_type', DB::raw('COUNT(*) cnt')) // raw : 우리가 보내는 문자열을 데이터베이스에서 그대로 쓸 수 있게 해줌
                        // ->whereNull('deleted_at')
                        ->groupBy('bc_type')
                        ->get();
        // SELECT  bc_type, COUNT(*) cnt FROM boards GROUP BY bc_type HAVING bc_type = 0;
        $result = DB::table('boards')
                        ->select('bc_type', DB::raw('COUNT(*) cnt'))
                        ->groupBy('bc_type')
                        ->having('bc_type', '=', '0')
                        ->get();

        // select b_id, b_title from boards order by b_id limit ? offset ? [1, 2]
        $result = DB::table('boards')
                        ->select('b_id', 'b_title')
                        ->orderBy('b_id')
                        ->limit('1')
                        ->offset('2')
                        ->get();

        // 동적 쿼리 만드는 법
        $requestData = [
            'u_id' => 2
        ];
        // null, false, 0, '', [] 의 경우에 when 조건이 실행되지 않는다.
        $result = DB::table('users')
                    ->when($requestData['u_id'], function($query, $u_id) { 
                        // when 절을 실행하기 전까지에 쿼리문을 담아준다.
                        // 그래서 함수를 실행시킬 때 when 절이 실행되기 전 쿼리문을 담아 where로 추가해주는 형태이다.
                        // when($requestData['u_id']) : 해당 변수 안에 'u_id'라는 데이터가 있는지 확인 후 있으면 function($query, $u_id)
                        // 두 번째 파라미터에 값을 자동으로 저장해준다. 
                        $query->where('u_id', '=', $u_id);
                    })
                    ->get(); 

        // 삭제되지 않은 글 중에 제목에 자유 또는 질문이 포함되어 있는 게시글 검색
        // SELECT * FROM boards WHERE ( b_title ? OR b_title LIKE ?) and deleted_at IS NULL;
        $result = DB::table('boards')
                    ->whereNull('deleted_at')
                    ->where(function($query) {
                        $query->where('b_title', 'like', '%자유%')
                                ->orWhere('b_title', 'like', '%질문%');
                    })
                    ->get();

        // first() : 쿼리 결과 중에 첫 번째 레코드만 반환
        // first() : 실행 메소드 중에 하나
        $result = DB::table('users')->first();
        //find($id) : 지정된 pk에 해당하는 레코드를 반환
        // $result = DB::table('users')->find(1);
        
        // count() : 쿼리 결과의 레코드 수를 반환 (return 값은 int를 반환한다.)
        $result = DB::table('users')->count();

        // insert
        // 쿼리가 정상적으로 처리를 했다면 true, 그렇지 않으면 false를 반환한다.
        // $arr = [
        //     'u_email' => 'kim@admin.com'
        //     ,'u_password' => Hash::make('qwer1234')
        //     ,'u_name' => '김영희' 
        // ];
        // $result = DB::table('users')
        //             ->insert($arr);

        // update
        // 변경된 레코드 수를 반환(int로 반환)
        // $arr = [
        //     'u_email' => 'tkdrl12@admin.com' 
        //     ,'u_name' => '최상기'
        // ];
        // $result = DB::table('users')
        //             ->where('u_id', '=', 5)
        //             ->update($arr);

        // // delete
        // // 변경된 레코드 수를 반환(int로 반환)
        // $result = DB::table('users')
        //             ->where('u_id', '=', 4)
        //             ->delete();

        // ---------------------
        // Eloquent Model
        // ---------------------
        // $result = User::get();
        $result = User::where('u_name', '=', '김철수')->first(); 
        // first는 where 조건에 맞는 첫 번째 레코드를 반환. 조건에 맞는 레코드가 없으면 null을 반환.
        // attrubutes
        // 변경되는 데이터가 저장되는 것 (DB 상에서 데이터가 변경되면 원본 데이터와 똑같이 변경)
        // original
        // 원본 데이터
        
        // 데이터를 있는 것을 변경하는게 아닌 새로 데이터를 넣는 것이기 때문에 인스턴스화를 해줘야 한다.
        // Insert
        // $userInsert = new User();

        // $userInsert->u_email = $request->u_email;
        // $userInsert->u_password = Hash::make($request->u_password);
        // $userInsert->u_name = $request->u_name;
        // $userInsert->save();
        
        
        // 기존 있는 데이터에서 수정이기 때문에 기존 있는 데이터 find(8) pk 8번을 불러와서 수정
        // Update
        // $userUpdate = User::find(8);
        // $userUpdate->u_name = '김철수';
        // $userUpdate->save();

        // delete
        // destroy : destroy(pk) 해당 pk의 데이터를 soft delete 처리를 한다.
        // $userDelete = User::destroy(8);

        // 삭제된 데이터도 포함해서 검색하고 싶을 때, 
        $result = User::withTrashed()->count();

        // 삭제된 데이터만 검색하고 싶을 때,
        $result = User::onlyTrashed()->count();

        // 삭제된 데이터를 살리고 싶을 때
        // "="만 생략이 가능하다.
        $result = User::where('u_id', 7)->restore();
        
        var_dump($result);
        return 'asdasdasd';
    }
}

