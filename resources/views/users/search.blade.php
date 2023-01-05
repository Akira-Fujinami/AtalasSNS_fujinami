@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
{!!Form::input('text','search','',['class'=>'search-username','placeholder'=>'ユーザー名'])!!}
<input type="image" class="search-image" src="images/post.png">
@if(!empty($result))
<span class="search-word">検索ワード：{{$result}}</span>
@endif
{!!Form::close()!!}
{{session('result')}}
<div id="top-bar">
</div>
@foreach ($search as $search)
<div class="searching">
{{ $search->username }}
<input type="button" class="btn-follow" onclick="location.href='http://127.0.0.1:8000/follow/{id}' "value="フォローする">
<input type="button" class="btn-unfollow" onclick="location.href='http://127.0.0.1:8000//unfollow/{id}' "value="フォロー解除">
</div>
@endforeach
@endsection
