<?php

namespace App\Utils;

use MyEncrypt;
use App\Models\User;

class MyToken {
    /**
     * 엑세스 토큰과 리프레시 토큰 생성
     * 
     * @param App\Models\User $user
     * @return Array [$accessToken, $refreshToken]
     */

    public function createTokens(User $user) {
        $accessToken = $this->createToken($user, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }

    /**
     * JWT 생성
     * 
     * @param App\Models\User $user
     * @param int $ttl (TIme To Limit)의 약자
     * @param bool $accessFlg = true
     * 
     * @return string JWT
     */

     private function createToken(User $user, int $ttl, bool $accessFlg = true) {
        $header = $this->createHeader();
        $payload = $this->createPayload($user, $ttl, $accessFlg);
        $signature = $this->createSignature($header, $payload);


        return $header.'.'.$payload.'.'.$signature;
     }

     /**
      * JWT Header 생성
      *
      * @return string base64UrlEncode
      */

      private function createHeader() {
        $header = [
            'alg' => env('TOKEN_ALG'),
            'typ' => env('TOKEN_TYPE'),
        ];

        return MyEncrypt::base64UrlEncode(json_encode($header));
      }

    /**
     * JWT 페이로드 작성
     * 
     * @param App\Models\User $user
     * @param int $ttl (TIme To Limit)의 약자
     * @param bool $accessFlg = true
     * 
     * @return string base64Payload
     */

     private function createPayload(User $user, int $ttl, bool $accessFlg = true) {
        $now = time(); // 현재 시간 습득

        // 페이로드 기본 데아터 생성
        $payload = [
            'idt' => $user->user_id,
            'iat' => $now,
            'exp' => $now + $ttl
            ,'ttl' => $ttl
        ];

        // 엑세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $user->account;
        }

        return MyEncrypt::base64UrlEncode(json_encode($payload));
     }


     /**
      * JWT 시그니쳐 작성
      *
      * @param string $header base64URL Encoda
      * @param string $payload base64URL Encoda

      * @return string base64Signature
      */
     private function createSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG'), $header.env('TOKEN_SECRET_KEY').$payload, MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH')));
     }
}