@extends('layouts.login')
@section('content')
<div id="top-bar-followlist">
    <h1 class="followlist">followlist</h1>
    @foreach($users as $users)
<td>
    @if($users->images == "dawn.png")
    <a href="/others/{{$users->id}}"><img src="images/icon1.png" class="icon-14">
@else
<a href="/others/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" class="icon-13">

@endif
</td>
@endforeach
</div>
@foreach($posts as $posts)
<div id="center-bar">
@if($posts->user->images == "dawn.png")
<a href="/others/{{$posts->user_id}}"><img src="{{asset('images/icon1.png')}}" class="icon-12"></a>
@else
<a href="/others/{{$posts->user_id}}"><img src="{{asset('storage/'.$posts->user->images)}}" class="icon-11"></a>
@endif
<div class="followlist-posts">
<div class="followlist-post">{{$posts->user->username}}</div>
<div class="followlist-create">{{$posts->created_at}}</div>
<div class="followlist-username">{{$posts->post}}</div>
</div>
</div>
@endforeach
@endsection