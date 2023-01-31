@extends('layouts.login')

@section('content')
    <div id="top-bar-others">
        @foreach ($others as $others)
        @if($others->images == "dawn.png")
            <div class="others-icon">
                <img src="/images/icon1.png" alt="others-icon">
            </div>
        @else
            <div>
                <img src="{{asset('storage/'.$others->images)}}" alt="others-image" class="others-image">
            </div>
        @endif
        <div class="others">
            <div class="other-name">
            name
            </div>
            <div class="others-name">{{$others->username}}
            </div>
            <div class="other-bio">
            bio
            </div>
            <div class="others-bio">{{$others->bio}}
            </div>
        </div>
        <div class="other-follow">
            @if (Auth::user()->isFollowing($others->id))
                {{Form::open(['url'=>'others/unfollow/{id}'])}}
                    {{Form::hidden('id',$others->id)}}
                    <td>{{Form::submit('フォロー解除',['class'=>'btn-unfollow'])}}
                    </td>
                {{Form::close()}}
            @else
                {{Form::open(['url'=>'others/follow/{id}'])}}
                    {{Form::hidden('id',$others->id)}}
                    <td>{{Form::submit('フォローをする',['class'=>'btn-follow'])}}
                    </td>
                {{Form::close()}}
            @endif
        </div>
        @endforeach
    </div>
    @foreach ($posts as $posts)
    <div id="center-bar">
        <td>
            @if($posts->user->images == "dawn.png")
                <div class="others-post-icon">
                    <img src="/images/icon1.png" alt="others-post-icon">
                </div>
            @else
                <div>
                    <img src="{{asset('storage/'.$posts->user->images)}}" alt="others-post-image" class="others-post-image">
                </div>
            @endif
                <div class="others-posts">
                    <div class="others-username">{{$posts->user->username}}
                    </div>
                    <div class="others-create">{{$posts->created_at}}
                    </div>
                </div>
                    <div class="others-post">{{$posts->post}}
                    </div>
        </td>
    </div>
    @endforeach
@endsection