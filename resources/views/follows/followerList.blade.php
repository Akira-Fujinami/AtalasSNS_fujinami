@extends('layouts.login')

@section('content')

<div id="top-bar-followerlist">
<h1>followerlist</h1>
    @foreach($usered as $usered)
<td>
    @if($usered->images == "dawn.png")
    <a href="/others/{{$usered->id}}"><img src="images/icon1.png" class="icon-14">
@else
<a href="/others/{{$usered->id}}"><img src="{{asset('storage/'.$usered->images)}}" class="icon-13">
@endif
</td>
@endforeach
</div>
@foreach($posts as $posts)
<div id="center-bar">
<div class="followlist">
<td>
@if($posts->user->images == "dawn.png")
<a href="/others/{{$posts->user_id}}"><img src="{{asset('images/icon1.png')}}" class="icon-12">
@else
<a href="/others/{{$posts->user_id}}"><img src="{{asset('storage/'.$posts->user->images)}}" class="icon-11">
@endif
<div class="followlist-posts">
<div class="followlist-post">{{$posts->user->username}} </div>
<div class="followlist-create">{{$posts->created_at}}</div>
<div class="followlist-post">{{$posts->post}}</div>
</div>
</td></div></div>

@endforeach
@endsection