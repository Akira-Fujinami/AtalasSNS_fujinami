<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;




class UsersController extends Controller

{

    //
    public function profile(){
        $user=Auth::user()->get();
        return view('users.profile',['user'=>$user]);
    }
    public function updateProfile(Request $request){
        $id=$request->input('id');
        $up_name=$request->input('upname');
        $up_mail=$request->input('upmail');
        $up_bio=$request->input('upbio');
        $up_PW=$request->input('upPW');
        $up_PW_confirmation=$request->input('upPW_confirmation');
        $request->validate([//バリデーションを行う
            'upname' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'upbio' => 'string|max:150',
            'upPW' => 'required|string|min:4|confirmed',//confirmedは最初に書く
            'upPW_confirmation' => 'required|string|min:4']);//名前_confirmation
        User::where('id',$id)->update([
            'username'=>$up_name,
            'mail'=>$up_mail,
            'bio'=>$up_bio,
            'password'=>$up_PW,$up_PW_confirmation,
        ]);$this->create($data);//値を保存する
        return redirect('/profile');
    }
    public function search(){
        $search=User::where('id','!=',Auth::id())->get();
        return view('users.search',['search'=>$search]);
    }
    public function searching(Request $request){
        $result=$request->input('search');
        if(!empty($result)){
            $search=User::where('username','like','%'.$result.'%')->where('id','!=',Auth::id())
            ->get();
            return view('users.search',compact('result','search'));
    }
     $search=User::where('id','!=',Auth::id())->get();
    return view('users.search',['search'=>$search]);
}
    }
