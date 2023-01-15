<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use App\Post;

class FollowsController extends Controller
{
    public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($login_user->id);
        $is_followed = $login_user->isFollowed($login_user->id);
        $follow_count = $follow->getFollowCount($login_user->id);
        $follower_count = $follow->getFollowerCount($login_user->id);

        return view('posts.index', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    public function follow(Request $request){
        $followed_id=$request->input('id');
        Follow::create([
            'following_id'=>Auth::id(),
            'followed_id'=>$followed_id,
        ]);
        return redirect('/search');
    }

    public function unfollow(Request $request){
        $followed_id=$request->input('id');
        Follow::where('following_id',Auth::id())->where('followed_id',$followed_id)->delete();
        return redirect('/search');
    }
    //
    public function followList(){
        $followlist=Auth::user()->follows()->pluck('followed_id');//followed_idを指定する,
        $posts=Post::with('user')->whereIn('user_id',$followlist)->orderby('created_at','desc')->get();
        $users=User::wherein('id',$followlist)->get();
        return view('follows.followList',['users'=>$users,'posts'=>$posts]);
    }
    public function followerList(){
        $followerlist=Auth::user()->followers()->pluck('following_id');
        $posts=Post::with('user')->whereIn('user_id',$followerlist)->orderby('created_at','desc')->get();
        $usered=User::wherein('id',$followerlist)->get();
        return view('follows.followerList',['usered'=>$usered,'posts'=>$posts]);
    }
    public function others($user_id){
        $others=User::where('id',$user_id)->get();
        $posts=Post::with('user')->where('user_id',$user_id)->orderby('created_at','desc')->get();
        return view('layouts.otherProfile',['others'=>$others,'posts'=>$posts]);
    }
    public function othersfollow(Request $request){
        $followed_id=$request->input('id');
        Follow::create([
            'following_id'=>Auth::id(),
            'followed_id'=>$followed_id,
        ]);
        return back();
    }
    public function othersunfollow(Request $request){
        $followed_id=$request->input('id');
        Follow::where('following_id',Auth::id())->where('followed_id',$followed_id)->delete();
        return back();
    }

}