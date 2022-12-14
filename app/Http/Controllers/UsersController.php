<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;




class UsersController extends Controller

{

    //
    public function profile(){
        $user=Auth::user()->get();
        return view('users.profile',['user'=>$user]);
    }
    public function updateProfile(Request $request){
        $id=Auth::id();
        $up_name=$request->input('upname');
        $up_mail=$request->input('upmail');
        $up_bio=$request->input('upbio');
        $up_PW=$request->input('upPW');
        $request->validate([//バリデーションを行う
            'upname' => 'required|string|max:255',
            'upmail' => 'required|string|email|max:255',
            'upbio' => 'string|max:150',
            'upPW' => 'required|string|min:4|confirmed',//confirmedは最初に書く
            'upPW_confirmation' => 'required|string|min:4',//名前_confirmation
            'image'=>'image|mimes:jpeg,png,jpg,gif']);
            if(isset($image)){
                $image=$request->image->store('','public');
        User::where('id',$id)->update([
            'username'=>$up_name,
            'mail'=>$up_mail,
            'bio'=>$up_bio,
            'password'=>bcrypt($up_PW),
            'images'=>$image,
        ]);}
        else{
            User::where('id',$id)->update([
                'username'=>$up_name,
                'mail'=>$up_mail,
                'bio'=>$up_bio,
                'password'=>bcrypt($up_PW),
            ]);
        }
        return redirect('profile');
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
