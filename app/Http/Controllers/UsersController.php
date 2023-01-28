<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;




class UsersController extends Controller

{

    //
    public function profile(){
        $user=Auth::user()->get();
        return view('users.profile',['user'=>$user]);
    }
    public function updateProfile(Request $request){
        $id=Auth::id();
        $up_name=$request->input('user_name');
        $up_mail=$request->input('mail_address');
        $up_bio=$request->input('bio');
        $up_PW=$request->input('password');
        $image=$request->image;
        $request->validate([//バリデーションを行う
            'user_name' => 'required|string|min:2|max:12',
            'mail_address' => ['required','email','string','min:5','max:40',Rule::unique('users','mail')->ignore(Auth::user()->mail)],
            'bio' => 'required|string|max:150',
            'password' => 'required|string|min:8|max:20|alpha_dash|confirmed',//confirmedは最初に書く
            'password_confirmation' => 'required|string|min:8|max:20|alpha_dash',//名前_confirmation
            'image'=>'image|mimes:jpeg,png,jpg,gif']);
            if(isset($image)){
                $upimages=$image->store('','public');
        User::where('id',$id)->update([
            'username'=>$up_name,
            'mail'=>$up_mail,
            'bio'=>$up_bio,
            'password'=>bcrypt($up_PW),
            'images'=>$upimages,
        ]);}
        else{
            User::where('id',$id)->update([
                'username'=>$up_name,
                'mail'=>$up_mail,
                'bio'=>$up_bio,
                'password'=>bcrypt($up_PW),
            ]);
        }
        return redirect('/top');
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
