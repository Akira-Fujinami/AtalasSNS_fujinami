@extends('layouts.login')
@section('content')
    <div id="top-bar-followlist">
        <p class="followlist">followlist</p>
        @foreach($users as $users)
            <td>
                @if($users->images == "dawn.png")
                    <a href="/others/{{$users->id}}"><img src="images/icon1.png" alt="フォロー中のアイコン" class="follow-icon"></a>
                @else
                    <a href="/others/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" alt="フォロー中のアイコン" class="follow-image"></a>
                @endif
            </td>
        @endforeach
    </div>
    @foreach($posts as $posts)
        <div id="center-bar">
            @if($posts->user->images == "dawn.png")
                <a href="/others/{{$posts->user_id}}">
                    <img src="{{asset('images/icon1.png')}}" alt="フォロー中のアイコン" class="follow-post-icon">
                </a>
            @else
                <a href="/others/{{$posts->user_id}}">
                    <img src="{{asset('storage/'.$posts->user->images)}}" alt="フォロー中のアイコン" class="follow-post-image">
                </a>
            @endif
            <div class="followlist-posts">
                <div class="followlist-username">{{$posts->user->username}}
                </div>
                <div class="followlist-create">{{$posts->created_at}}
                </div>
                <div class="followlist-post">{{$posts->post}}
                </div>
            </div> 
        </div>
    @endforeach
@endsection