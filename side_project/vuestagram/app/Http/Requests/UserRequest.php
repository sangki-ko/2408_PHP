<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    // reles : 유효성 검사 칙들을 담았던 배열을 적어준다.
    public function rules()
    {
        $rules = [
                    'account' => ['required', 'between:5,20', 'regex:/^[0-9a-zA-z]+$/']
                    ,'password' => ['required', 'between:5,20', 'regex:/^[0-9a-zA-z!@]+$/']
                ];
        
        if($this->routeIs('post.login')) {
            $rules['account'][] = 'exists:users,account';
        }

        return $rules;
        
    }

    // failedValidation : 유효성 검사에서 오류가 났을 때 처리를 해주는 함수
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'message' => '유효성 체크 오류',
            'data' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);
    }
}
