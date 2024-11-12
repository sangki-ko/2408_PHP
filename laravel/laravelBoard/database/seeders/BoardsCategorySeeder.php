<?php

namespace Database\Seeders;

use App\Models\BoardsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seeder를 명령어로 실행하면 run 메소드가 시작된다.
    public function run()
    {
        BoardsCategory::insert([
            ['bc_type' => '0', 'bc_name' => '자유게시판']
            ,['bc_type' => '1', 'bc_name' => '질문게시판']
            ,['bc_type' => '2', 'bc_name' => '문의게시판']
        ]);
    }
}
