<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

class UserController extends Controller
{
    // 로그인 페이지로 이동
    public function goLogin() {
        return view('login');
    }

    // 로그인 처리
    public function login(Request $request) {
        // 유효성 체크
        // laravel에선 Validator 하나로 모든 유효성 검사를 할 수 있다.
        $validator = Validator::make(
            // only 메소드 : 값들을 배열에 담아서 리턴
            $request->only('u_email', 'u_password')
            ,[
                // 필수로 넣어야 하는 데이터 ['required'];
                // uniqie:테이블명, 컬럼명 = 유저가 입력한 아이디가 없을 경우 통과
                // exists:테이블명, 컬럼명 = 유저가 입력한 아이디가 있을 경우 통과
                'u_email' => ['required', 'email', 'exists:users,u_email']
                // integer을 넣으면 min max가 최소, 최대값이 숫자로 된다. 예) 숫자6부터 숫자20까지를 의미한다.
                // regex : 정규식을 넣어 유효성 검사를 한 번 더 해준다.
                ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-z0-9!@]+$/']
            ]
        );
        if($validator->fails()) {
            return redirect()
                        ->route('goLogin')
                        ->withErrors($validator->errors());  
        }

        // 회원 정보 획득
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        // 비밀번호 체크
        if(!Hash::check($request->u_password, $userInfo->u_password)) {
            return redirect()->route('goLogin')->withErrors('비밀번호가 일치하지 않습니다.');
        }

        // 유저 인증 처리
        Auth::login($userInfo);


        // var_dump(Auth::i d()); // 로그인한 유저의 pk 획득
        // var_dump(Auth::user()); // 로그인한 유저의 모든 정보 획득
        // var_dump(Auth::check()); // 로그인 여부 체크
        return redirect()->route('boards.index');

    }

    public function logout() {
        Auth::logout(); // 로그아웃 처리

        // 세션을 처음에 발급하면 세션 아이디로 유지를 하는데, 로그아웃을 하고나면 세션 아이디를 초기화
        // 기존 세션의 모든 데이터 제거 및 새로운 세션 ID 발급
        Session::invalidate(); 

        Session::regenerateToken(); // CSRF 토큰 재발급

        return redirect()->route('goLogin');
    }

    public function regist() {
        return view('regist');
    }

    public function goRegist(Request $request) {
        $errorMsg = '';
        $validator = Validator::make(
            $request->only('u_email', 'u_password', 'verifyPassword', 'u_name')
            ,[
                'u_email' => ['required', 'unique:users,u_email', 'max:20', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/'],
                'u_password' => 'required|min:8',
                'verifyPassword' => ['same:u_password'],
                'u_name' => ['required', 'regex:/^[가-힣]{2,5}$/u']
            ]
        );

        if($validator->fails()) {
            return redirect()
                        ->route('regist')
                        ->withErrors($validator->errors())
                        ->withinput();
        }

        try {
            DB::beginTransaction();
    
            // $userInsert = new User();
    
            // $userInsert->u_email = $request->u_email;
            // $userInsert->u_password = Hash::make($request->u_password);
            // $userInsert->u_name = $request->u_name;
            // $userInsert->save();

            User::create([
                'u_email' => $request->u_email
                ,'u_password' => Hash::make($request->u_password)
                ,'u_name' => $request->u_name
            ]);

            DB::commit();

            return redirect()->route('goLogin')->withErrors('회원가입이 완료되었습니다.');
        }catch(Throwable $th) {
            return redirect()->route('goLogin')->withErrors('서버에 문제가 발생하였습니다. 다시 시도해주세요.');
            DB::rollBack();
        }

    }
}