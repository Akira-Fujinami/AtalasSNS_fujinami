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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');//nameの後にurlを指定する事でログインできずurlに移動する
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){//新規登録していないとログインできない
Route::get('/top','PostsController@index');

Route::get('/logout','Auth\LoginController@logout');

Route::post('/post','PostsController@create');

Route::post('/post/update','Postscontroller@update');

Route::get('post/{id}/delete','Postscontroller@delete');

Route::get('/search','Userscontroller@search');
Route::post('/search','Userscontroller@searching');

Route::post('/follow/{id}','Followscontroller@follow');
Route::post('/unfollow/{id}','Followscontroller@unfollow');

Route::get('/profile','UsersController@profile');
Route::post('/profile/update','Userscontroller@updateProfile');

Route::get('/show','FollowsContoroller@show');

Route::get('/followList','FollowsController@followlist');
Route::get('/followerList','FollowsController@followerlist');

Route::get('/others/{user_id}','FollowsController@others');
Route::post('others/follow/{id}','Followscontroller@othersfollow');
Route::post('others/unfollow/{id}','Followscontroller@othersunfollow');

});