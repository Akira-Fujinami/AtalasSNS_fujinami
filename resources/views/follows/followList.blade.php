@extends('layouts.login')
@section('content')
<div id="top-bar-followlist">
    <h1 class="followlist">followlist</h1>
    @foreach($users as $users)
<td>
    @if($users->images == "dawn.png")
    <a href="/others/{{$users->id}}"><img src="images/icon1.png" class="icon-9">
@else
<a href="/others/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" class="icon-10">

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
<div class="followlist-username">{{$posts->user->username}} </div>
<div class="followlist-create">{{$posts->created_at}}</div>
<div class="followlist-post">{{$posts->post}}</div>
</div>
</td></div>
</div>
@endforeach
@endsection