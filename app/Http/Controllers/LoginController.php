<?php

namespace App\Http\Controllers;

use Overtrue\LaravelSocialite\Socialite;

class LoginController extends Controller
{
    /**
     * 跳转对应驱动的授权登录页面
     *
     * @param $driver
     */
    public function redirectToProvider($driver){
        if(!in_array($driver,array('github','weibo','qq'))){
            abort(404);
        }
        $driver = Socialite::driver($driver);
        return $driver->redirect();

    }

    /**
     * 授权登录回调页面
     *
     * @param $driver
     */
    public function handleProviderCallback($driver){
        $user = Socialite::driver($driver)->user();
        return view('auth.oauth',compact('user'));
    }
}
