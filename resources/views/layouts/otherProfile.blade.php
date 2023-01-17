@extends('layouts.login')

@section('content')
<div id="top-bar-followlist">
@foreach ($others as $others)
@if($others->images == "dawn.png")
<div class="icon100">
<img src="/images/icon1.png"></div>
@else
<img src="{{asset('storage/'.$others->images)}}" class="icon101">

@endif
<div class="others">
    <div class="other-name">
name</div><div class="others-name">{{$others->username}}</div>
<div class="other-bio">
bio </div><div class="others-bio">{{$others->bio}}</div>
</div>

<div class="other-follow">
@if (Auth::user()->isFollowing($others->id))
{{Form::open(['url'=>'others/unfollow/{id}'])}}
                {{Form::hidden('id',$others->id)}}
                <td>{{Form::submit('フォロー解除',['class'=>'btn-unfollow'])}}</td>
               {{Form::close()}}



                               @else
                               {{Form::open(['url'=>'others/follow/{id}'])}}
                {{Form::hidden('id',$others->id)}}
                <td>{{Form::submit('フォローをする',['class'=>'btn-follow'])}}</td>
                {{Form::close()}}
                               @endif
@endforeach
</div>
</div>
@foreach ($posts as $posts)
<div id="center-bar">
<td>
@if($posts->user->images == "dawn.png")
<div class="icon110">
<img src="/images/icon1.png"></div>
@else
<img src="{{asset('storage/'.$posts->user->images)}}" class="icon111">

@endif
<div class="others-posts">
<div class="others-create">{{$posts->user->username}}</div>
<div class="others-post">{{$posts->created_at}}</div></div>
<div class="others-username">{{$posts->post}}</div>
</td></div>
@endforeach
@endsection