<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    // Authenticatable : User 파일의 이름을 별칭으로 만들어주고 extends로 연결한 것이다. (결국 Models가 상속되어 있는 User 파일이다.)
    // SoftDeletes 트레이트 : 해당 모델에 SoftDelete를 적용하고 싶을 때 추가, 데이터를 삭제해도 soft delete 처리가 된다.
    // trait(트레이트) : 가져와서 사용할 수 있는 주머니 같은 느낌이다. (객체 안에 use를 통해 가져와서 쓴다.)
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // 테이블 명 정의하는 프로퍼티 (디폴트는 모델명의 복수형)
    // 테이블 명은 정의하고 시작하도록 하자
    protected $table = 'users';

    // pk를 지정하는 프로퍼티
    // 프로퍼티 명은 primaryKey로 고정해서 넣어줘야 한다.
    protected $primaryKey = 'u_id';

    // 화이트 리스트 방식, 블랙 리스트 방식
    // 화이트 : 내부가 다 들여보인다는 의미로 내가 허용할 컬럼들을 설정
    // 블랙 : 우리가 허용하지 않을 컬럼들을 설정

    // upsert시 변경을 허용할 컬럼들을 설정하는 프로퍼티 (화이트 리스트)
        // -> upsert : 업데이트와 인설트를 합친 단어
        // 마찬가지로 프로퍼티명 고정이다.
    protected $fillable = [
        'u_email'
        ,'u_password'
        ,'u_name'
        ,'created_at'
        ,'updated_at'
        ,'deleted_at'
    ];

    // upsert시 변경을 허용하지 않을 컬럼들을 설정하는 프로퍼티(블랙리스트)
    // 마찬가지로 프로퍼티명 고정이다.
    // protected $guarded = [
    //     'id'
    // ];
}
