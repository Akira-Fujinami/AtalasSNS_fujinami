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

{{$posts->post}}
@if($posts->user->images == "dawn.png")
<img src="/images/icon1.png">
@else
<img src="{{asset('storage/'.$posts->user->images)}}" class="icon">

@endif
{{$posts->user->username}}
{{$posts->created_at}}
@endforeach
@endsection