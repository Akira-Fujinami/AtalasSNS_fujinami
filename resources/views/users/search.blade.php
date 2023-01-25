@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
{!!Form::input('text','search','',['class'=>'search-username','placeholder'=>'ユーザー名'])!!}
<input type="image" class="search-image" src="images/虫眼鏡.png">
@if(!empty($result))
<span class="search-word">検索ワード：{{$result}}</span>
@endif
{!!Form::close()!!}
<div id="top-bar">
</div>
@foreach ($search as $search)
<div class="searching">
@if($search->images == "dawn.png")
<img src="images/icon1.png" class="icon-99">
@else
<img src="{{asset('storage/'.$search->images)}}" class="icon-51">
@endif
<div class="searcher">
{{ $search->username }}</div>
@if (Auth::user()->isFollowing($search->id))
{{Form::open(['url'=>'/unfollow/{id}'])}}
                {{Form::hidden('id',$search->id)}}
                <td>{{Form::submit('フォロー解除',['class'=>'btn-unfollow'])}}</td>
               {{Form::close()}}



                               @else
                               {{Form::open(['url'=>'/follow/{id}'])}}
                {{Form::hidden('id',$search->id)}}
                <td>{{Form::submit('フォローをする',['class'=>'btn-follow'])}}</td>
                {{Form::close()}}
                               @endif

</div>
@endforeach
@endsection
