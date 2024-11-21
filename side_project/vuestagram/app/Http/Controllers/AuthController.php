<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request) {
        // TODO : 비밀번호 체크 다음주
        $userInfo = User::where('account', $request->account)->first();

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

        // 토큰 저장 
        
        return 'test';
    }
}
