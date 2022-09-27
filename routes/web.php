<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

});



//ログアウト中のページ

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => 'auth'], function(){

Route::get('/top','PostsController@index');
// Route::get('/top','PostsController@update');
Route::post('posts/{id}/update', 'PostsController@update');

Route::get('/profile','UsersController@profile');

Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

// フォロー/フォロー解除を追加
Route::post('/search/{id}/follow','UsersController@follow')->name('follow');
Route::get('/search/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

// Route::get('/search-form','UsersController@searchForm');
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');


//プロフィール編集画面表示
Route::get('/profile', 'UsersController@show')->name('profile');
//プロフィール編集
Route::post('/profile', 'UsersController@profileUpdate')->name('profile_edit');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('posts/create-form', 'PostsController@createForm')->name('posts.create');
Route::post('posts/create', 'PostsController@store');

Route::get('post/{id}/delete', 'PostsController@delete')->name('posts.index');


});
