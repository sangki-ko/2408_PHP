<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'board_id';

    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like'
    ];

    protected function serializeDate(\DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    // 1대 다수를 뜻한다 1인 쪽에는 hasMany, 다수 쪽에는 belongsTo를 선언해서 연결해준다.
    public function user() {
        return $this->belongsTo(User::class, 'user_id')->select('user_id', 'name');
    }
}



