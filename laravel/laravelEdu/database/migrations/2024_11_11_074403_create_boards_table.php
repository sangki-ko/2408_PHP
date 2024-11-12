<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 마이그레이션 파일 생성 : php artisan make:migration 파일명
    // 마이그레이션 실행 : php artisan migrate
    // 마이그레이션 롤백(직전의 마이그레이션 작업 되돌리기) : php artisan migrate:rollback
    // 마이그레이션 리셋(모든 마이그레이션 작업 되돌리기) : php artisan migrate:reset

    /**
     * Run the migrations.
     *
     * @return void
     */

    // Migration을 실행 -> up 메소드 실행
    // 애초에 여기서 테이블을 만든다.
    public function up()
    {
        Schema::create('boards_test', function (Blueprint $table) {
            $table->id('b_id');
            // bigInteger() : ('설정할 컬럼명', '오토 인크리먼트 할래 말래', '언사인드 할래 말래')
            $table->bigInteger('u_id', false, true);
            // char() : ('컬럼명', 길이)
            $table->char('bc_type', 1);
            // string() : ('컬럼명', 길이) 데이터 베이스에선 VARCHAR이다.
            $table->string('b_title', 50);
            $table->string('b_content', 200);
            $table->string('b_img', 100);
            // timestamps() : created_at, updated_at을 자동으로 만드는 메소드
            // 모델에서 알아서 데이터를 기입해준다.
            $table->timestamps();
            // timestamp : 데이터  타입 ('컬럼명')->nullable(기본값 널)
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // 데이터베이스 스키마를 이전 상태로 복구할 때 유용
    // 개발 과정에서 마이그레이션을 재구성하거나 잘못된 마이그레이션을 수정하기 위해 사용.
    public function down()
    {
        Schema::dropIfExists('boards_test');
    }
};
