<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User();
        // $user->u_email = 'tkdrl11@admin.min';
        // $user->u_password = Hash::make('qwer1234');
        // $user->u_name = '관리자';
        // $user->save();

        // 사용할 일이 없음 **
        // User::insert([
        //     'u_email' => 'tkdrl11@admin.min'
        //     ,'u_password' => Hash::make('qwer1234')
        //     ,'u_name' => '관리자'
        // ]);

        User::factory(30)->create();
    }
}
