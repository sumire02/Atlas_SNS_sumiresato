<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\index;
use App\Follow;
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

    // public function searchForm(){
    //     $users = User::get();
    //         return view('users.search',[
    //         'users' => $users
    //         ]);

    // }
    public function search(Request $requset){
        $keyword = $requset->input('search');
        $requset=session()->put('search',$keyword);
        $query = User::query();

        if(!empty($keyword)) {
            $users = $query->where('username','like', '%'.$keyword. '%')->get();
             }
        else{
            $users = User::get();
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
    public function follow(Request $request, $id)
    {
        $follows = new Follow;
        $follows->followed_id = $request->id;
        $follows->following_id = Auth::id();
        $follows->save();
        return redirect('search');
    }

    // フォロー解除
    public function unfollow($id)
    {
        $following_id = Auth::user()->id;
        Follow::where('followed_id', $id)
        ->where('following_id', $following_id)
        ->delete();
        return redirect('search');
    }

}
