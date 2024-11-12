<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    
    // Migration : 데이터베이스 스키마를 코드로 관리하고, 데이터베이스의 변경 사항을 추적하고 적용
    // 스키마 : 이터베이스(Database) 전체 또는 일부의 논리적인 구조를 표현하는 것으로 데이터베이스 내에서 데이터가 어떤 구조로 저장되는지를 나타낸다.
    // 기존의 변경사항에 대한 이력을 자동으로 관리해주어 편리하다.

    // factories : 더미 데이터를 만드는 공장
    // 테스트 데이터를 손쉽게 생성할 수 있는 매우 유용한 기능

    // seeders : 데이터베이스에 기본 데이터를 채워 넣기 위해 사용하는 기능
    // 시더는 개발 환경 또는 초기화 단계에서 데이터베이스에 필요한 초기 데이터를 넣을 때 주로 사용
    //  관리자 계정이나 기본 설정 데이터를 자동으로 생성하는 데 유용
}
