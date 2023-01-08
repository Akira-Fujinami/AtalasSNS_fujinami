<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    public function follow(Request $request){
        $followed_id=$request->input('id');
        //dd($followed_id);
        Follow::create([
            'following_id'=>Auth::id(),
            'followed_id'=>$followed_id,
        ]);
        return redirect('/search');
    }

    public function unfollow(User $search){
        $follower=auth()->user();//全てのユーザー
        $is_following=$follower->isFollowing($search->id);//フォローしているか
        if($is_following){//フォローしてたらフォローする
            $follower->unfollow($search->id); 
        }
        return redirect('/search');
    }
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

}
