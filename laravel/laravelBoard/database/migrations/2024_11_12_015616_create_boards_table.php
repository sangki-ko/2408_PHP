<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // migrate 실행 : (php artisan migrate)
        // reset : 전체 초기화 (php artisan migrate:reset)
        // rollback : batch 가장 마지막 번호만 rollback (php artisan migrate:rollback)
        Schema::create('boards', function (Blueprint $table) {
            $table->id('b_id');
            $table->bigInteger('u_id', false, true);
            $table->char('bc_type', 1);
            $table->string('b_title', 50);
            $table->string('b_content', 200);
            $table->string('b_img', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
