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
        return view('users.profile');
    }
    public function search(){
        $search=User::all();
        return view('users.search',['search'=>$search]);
    }
}
