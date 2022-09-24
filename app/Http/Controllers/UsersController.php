<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\index;
use App\Follower;
use Auth;


class UsersController extends Controller
{
    //

    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }
    public function profile(){
        return view('users.profile');
    }

    public function searchForm(){
        $users = User::get();
            return view('users.search',[
            'users' => $users
            ]);

    }
    public function search(Request $requset){
        $users = $requset->input('search');
        $requset=session()->put('search',$users);
        $query = User::query();

        if(!empty($users)) {
            $users = $query->where('username','like', '%'.$users. '%')->get();
             }

            return view('users.search',[
            'users' => $users
            ]);

    }
    public function show()
    {
        $users = Auth::user();
        return view('users.profile', ['users' => $users]);
    }
    public function profileUpdate(Request $request, User $users)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:12'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:40', 'unique:users,mail'],
            'password' =>['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'password_comfirm' =>['required', 'string', 'min:8', 'max:20'],
            'bio' =>['nullable', 'string', 'max:150'],
            'icon_imagi' =>['nullable', 'alpha_num', 'mimes:jpeg,png,jpg,zip,pdf'],
        ]);
    }
        // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }

        // FollowUser::firstOrCreate([
        //     'followed_id' => $requset->post_user,
        //     'following_id' => $requset->auth_user
        // ]);
        // return true;
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
        // $follow = FollowUser::where('followed_id', $requset->post_user)
        // ->where('following_id', $requset->auth_user)
        // ->first();
        // if($follow){
        //     $follow->delete();
        //     return true;
        // }
    }
}
