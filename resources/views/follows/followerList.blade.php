@extends('layouts.login')

@section('content')
    <div id="top-bar-followerlist">
        <h1>followerlist</h1>
        @foreach($usered as $usered)
        <td>
            @if($usered->images == "dawn.png")
                <a href="/others/{{$usered->id}}"><img src="images/icon1.png" alt="follower-icon" class="follower-icon"></a>
            @else
                <a href="/others/{{$usered->id}}"><img src="{{asset('storage/'.$usered->images)}}" alt="follower-image" class="follower-image"></a>
            @endif
        </td>
        @endforeach
    </div>
    @foreach($posts as $posts)
    <div id="center-bar">
        @if($posts->user->images == "dawn.png")
            <a href="/others/{{$posts->user_id}}"><img src="{{asset('images/icon1.png')}}" alt="follower-icon" class="follower-post-icon"></a>
        @else
            <a href="/others/{{$posts->user_id}}"><img src="{{asset('storage/'.$posts->user->images)}}" alt="follower-image" class="follower-post-image"></a>
        @endif
        <div class="followlist-posts">
            <div class="followerlist-username">{{$posts->user->username}}
            </div>
            <div class="followerlist-create">{{$posts->created_at}}
            </div>
            <div class="followerlist-post">{{$posts->post}}
            </div>
        </div>
    </div>

    @endforeach
@endsection