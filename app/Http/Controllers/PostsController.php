<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list=Post::where('user_id',Auth::id())->get();
        return view('posts.index',['list'=>$list]);//ファイル名,渡す先の変数名=>今回渡す変数名
    }

    public function create(Request $request){
        $post=$request->input('newPost');
        Post::create([
            'post'=>$post,//postカラムに変数を入れる
            'user_id'=>Auth::id()//user_idのテーブルカラムにログインしたユーザーIDを取得する
        ]);//post変数に値を当てはめて登録する
        return redirect('/top');
    }

    public function delete($id){
        Post::where('id',$id)->delete();
        return redirect('/top');
    }

    public function updateForm($id){
        $post=Post::where('id',$id)->first();
        return view('posts.index',['post'=>$post]);
    }

    public function update(Request $request){
        $id=$request->input('id');//$変数=$request->input('name属性')
        $up_post=$request->input('upPost');
        Post::where('id',$id)->update([
            'post'=>$up_post,]);//postカラムを変数に更新する
        return redirect('/top');
    }

    //
}