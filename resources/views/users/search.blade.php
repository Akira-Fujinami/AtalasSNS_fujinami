@extends('layouts.login')
@section('content')
    {!! Form::open(['url' => '/search']) !!}
        {!!Form::input('text','search','',['class'=>'search-username','placeholder'=>'ユーザー名'])!!}
        <input type="image" class="search-images" src="images/検索窓.png" alt="検索ボタン">
        @if(!empty($result))
            <span class="search-word">検索ワード：{{$result}}
            </span>
        @endif
    {!!Form::close()!!}
    <div id="top-bar">
    </div>
    @foreach ($search as $search)
        <div class="searching">
            @if($search->images == "dawn.png")
                <div class="search-user">
                    <img src="images/icon1.png" alt="検索結果のユーザーのアイコン">
                </div>
            @else
                <div class="search-user-image">
                    <img src="{{asset('storage/'.$search->images)}}" alt="検索結果のユーザーのアイコン" class="search-image">
                    </div>
            @endif
            <div class="search-name">
                {{ $search->username }}
            </div>
            @if(Auth::user()->isFollowing($search->id))
                {{Form::open(['url'=>'/unfollow/{id}'])}}
                    {{Form::hidden('id',$search->id)}}
                    {{Form::submit('フォロー解除',['class'=>'btn-unfollow'])}}
                {{Form::close()}}
            @else
                {{Form::open(['url'=>'/follow/{id}'])}}
                    {{Form::hidden('id',$search->id)}}
                    {{Form::submit('フォローをする',['class'=>'btn-follow'])}}
                {{Form::close()}}
            @endif
        </div>
    @endforeach
@endsection
