<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;


class FollowsController extends Controller
{
    //
    public function followList(){
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        $users = User::whereIn('id', $following_id)->get();

        return view('follows.followList', compact('posts', 'users'));
    }
    public function followerList(){
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
        $users = User::whereIn('id', $followed_id)->get();

        return view('follows.followerList', compact('posts', 'users'));

    }
}
