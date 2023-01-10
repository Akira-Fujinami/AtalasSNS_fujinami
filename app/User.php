<?php

namespace App;
use App\Follow;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Posts()
    {
        return $this->hasMany('App\Post');
    }
    public function follows(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }
    //フォローしているか
    public function isFollowing($user_id){
        return(boolean)$this->follows()->where('followed_id',$user_id)->first();
    }
    //フォローされているか
    public function isFollowed($user_id){
        return(boolean)$this->followers()->where('following_id',$user_id)->first();
    }
}
