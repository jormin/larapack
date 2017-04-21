<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    /**
     * 关注首页
     */
    public function index(){
        $followings = Auth::user()->followings()->get();
        $followers = Auth::user()->followers()->get();
        $all = User::get();
        return view('follow.index',compact('followings','followers','all'));
    }

    /**
     * 关注
     *
     * @param $id
     */
    public function follow($id){
        $follower = User::findOrFail($id);
        if(Auth::user()->id === $id){
            return redirect()->back()->withErrors(['自己不能关注自己']);
        }
        if(Auth::user()->isFollowing($id)){
            return redirect()->back()->withErrors(['已经关注该用户']);
        }
        Auth::user()->follow($id);
        return redirect()->back()->with('success','关注成功');
    }

    /**
     * 取消关注
     *
     * @param $id
     */
    public function unfollow($id){
        $follower = User::findOrFail($id);
        if(!Auth::user()->isFollowing($id)){
            return redirect()->back()->withErrors(['尚未关注该用户']);
        }
        Auth::user()->unfollow($id);
        return redirect()->back()->with('success','取消关注成功');

    }

    /**
     * 关注列表
     */
    public function followers(){

    }
}
