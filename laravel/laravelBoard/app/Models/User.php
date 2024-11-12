<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'u_id';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'u_name',
        'u_email',
        'u_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     * 우리가 가지고 있는 데이터를 JS 형태로 바꾸는 작업을 해주는게 serialization이라고 한다.
     * @var array<int, string>
     */
    protected $hidden = [
        'u_password'
    ];
}
