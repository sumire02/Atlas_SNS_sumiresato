<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // postsテーブルとのリレーション（主テーブル側）
    public function posts() { //1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
    }

    public function followers() { //1対多の「多」側なので複数形
        return $this->belongsToMany(self::class, 'follows', 'followed_id', 'following_id');
    }

        public function follows() { //1対多の「多」側なので複数形
        return $this->belongsToMany(self::class, 'follows', 'following_id', 'followed_id');
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->follows()->where('following_id', $user_id)->exists();
    }


}
