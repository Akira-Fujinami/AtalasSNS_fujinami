@extends('layouts.login')

@section('content')
<div id="top-bar-followlist">
@foreach ($others as $others)
@if($others->images == "dawn.png")
<img src="/images/icon1.png">
@else
<img src="{{asset('storage/'.$others->images)}}" class="icon">

@endif
{{$others->username}}
{{$others->bio}}

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
@foreach ($posts as $posts)
<div id="center-bar">
<td>
@if($posts->user->images == "dawn.png")
<img src="/images/icon1.png">
@else
<img src="{{asset('storage/'.$posts->user->images)}}" class="icon">

@endif
<div class="others-posts">
<div class="others-create">{{$posts->user->username}}</div>
<div class="others-username">{{$posts->post}}</div>
<div class="others-post">{{$posts->created_at}}</div>
</div>
</td></div>
@endforeach
@endsection