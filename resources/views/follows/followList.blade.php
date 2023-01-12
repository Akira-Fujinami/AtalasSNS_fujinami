@extends('layouts.login')
@section('content')
<div id="top-bar-followlist">
    <h1>followlist</h1>
    @foreach($users as $users)
<td>
    @if($users->images == "dawn.png")
<img src="images/icon1.png">
@else
<img src="{{asset('storage/'.$users->images)}}" class="icon">

@endif
</td>
@endforeach
</div>
@foreach($posts as $posts)
<div class="followlist">
<td>
@if($posts->user->images == "dawn.png")
<a href="/others/{{$posts->user_id}}"><img src="{{asset('images/icon1.png')}}"><a href="/others/{{$posts->user_id}}">
@else
<img src="{{asset('storage/'.$posts->user->images)}}" class="icon"><a href="/others/{{$posts->user_id}}">
@endif
<div class="followlist-posts">
<div class="followlist-post">{{$posts->user->username}} 
   {{$posts->created_at}}</div>
   {{$posts->post}}
</div>
</td></div>

@endforeach
@endsection