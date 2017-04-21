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

// 邮件
Route::resource('emails','EmailsController');
Route::post('emails/send',['as'=>'emails.send','uses'=>'EmailsController@send']);

// 国家
Route::get('country', ['as'=>'country','uses'=>'CountryController@index']);

// UA
Route::get('agent', ['as'=>'agent','uses'=>'AgentController@index']);

// 拼音
Route::get('pinyin/index', ['as'=>'pinyin.index','uses'=>'PinyinController@index']);
Route::post('pinyin/convert', ['as'=>'pinyin.convert','uses'=>'PinyinController@convert']);

// 登录
Route::group(['prefix'=>'login'],function(){
    Route::get('/{driver}', ['as'=>'login.redirect','uses'=>'LoginController@redirectToProvider']);
    Route::get('/{driver}/callback', ['as'=>'login.callback','uses'=>'LoginController@handleProviderCallback']);
});

// 汽车
Route::resource('cars','CarController');

// 用户相关
Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
    // 关注相关
    Route::group(['prefix'=>'follow'],function(){
        Route::get('/', ['as'=>'user.follow','uses'=>'FollowController@index']);
        Route::get('/{user}/follow', ['as'=>'user.follow.follow','uses'=>'FollowController@follow']);
        Route::get('/{user}/unfollow', ['as'=>'user.follow.unfollow','uses'=>'FollowController@unfollow']);
        Route::get('/{user}/followers', ['as'=>'user.follow.followers','uses'=>'FollowController@followers']);
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::get('logs', ['as'=>'logs','uses'=>'\Rap2hpoutre\LaravelLogViewer\LogViewerController@index']);
