@extends('layouts.login')
@section('content')
<div id="top-bar-followlist">
    <h1 class="followlist">followlist</h1>
    @foreach($users as $users)
        <td>
            @if($users->images == "dawn.png")
                <a href="/others/{{$users->id}}"><img src="images/icon1.png" alt="follow-icon" class="follow-icon"></a>
            @else
                <a href="/others/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" alt="follow-image" class="follow-image"></a>
            @endif
        </td>
    @endforeach
</div>
        @foreach($posts as $posts)
        <div id="center-bar">
            @if($posts->user->images == "dawn.png")
                <a href="/others/{{$posts->user_id}}"><img src="{{asset('images/icon1.png')}}" alt="follow-icon" class="follow-post-icon"></a>
            @else
                <a href="/others/{{$posts->user_id}}"><img src="{{asset('storage/'.$posts->user->images)}}" alt="follow-image" class="follow-post-image"></a>
            @endif
                <div class="followlist-posts">
                    <div class="followlist-post">{{$posts->user->username}}
                    </div>
                    <div class="followlist-create">{{$posts->created_at}}
                    </div>
                    <div class="followlist-username">{{$posts->post}}
                    </div>
                </div> 
        </div>
@endforeach
@endsection