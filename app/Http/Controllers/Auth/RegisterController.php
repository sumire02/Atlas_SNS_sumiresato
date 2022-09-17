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
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'mail' => ['required', 'string', 'email', 'min:5', 'max:40', 'unique:users,mail'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:20', ],
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
            $data = $request->input();
            $name = $request->username;

            // バリデーション　エラーになった時
            $validator = $this->validator($data);

            if ($validator->fails()) {
                return redirect('/register')
                ->withErrors($validator)
                ->withInput();
            }

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
