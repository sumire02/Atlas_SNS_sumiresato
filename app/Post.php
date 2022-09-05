<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    // usersテーブルとのリレーション（従テーブル側）
    public function user() {
        return $this->belongsTo('App\User');
    }
}
