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
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ]);

        try {
            $users = Auth::user();
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗')->withInput();
        }
        return redirect()->route('articles_index')->with('msg_success', 'プロフィールの更新が完了');
    }
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $users = Auth::user();
            $users->password = bcrypt($request->input('password'));
            $users->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'パスワードの更新に失敗')->withInput();
        }
        return redirect()->route('articles_index')->with('msg_success', 'パスワードの更新が完了');
    }
}
