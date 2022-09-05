<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //ログイン後のリダイレクト先を記述
    public function redirectPath()
    {
        return 'article/index';
    }


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input(
                [
                    'username' => 'required|string|min:2|max:12',
                    'mail' => 'required|string|email|min:5|max:40|unique:users',
                    'password' => 'required|min:8|max:20|confirmed',
                    'password_confirmation' => 'required',
                ],
                [
                'username.required' => '名前を入力してください。',
                'username.max' => '名前は20字以内で入力してください。',
                'mail.required' => 'Eメールを入力してください。',
                'mail.email' => 'Eメールはメールアドレス形式で入力してください。',
                'password.required' => 'パスワードを入力してください。',
                'password_confirmation.required'  => '確認用のパスワードを入力をして下さい。',
            ]);
            $data = $request->input();
            $name = $request->username;
            $this->create($data);
            return view('auth.added',compact('name'));
        }
        return view('auth.register');
    }

    public function added(Request $request){
        $username = $request->input('username');
        return view('auth.added', ['username'=>$username]);
    }

}
