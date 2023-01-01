@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
{!!Form::input('text','search','',['class'=>'form-control','placeholder'=>'ユーザー名'])!!}
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button>
{!!Form::close()!!}
{{session('result')}}
@foreach ($search as $search)
<div>
{{ $search->username }}
<p class="follow-btn"><a href="/follow/{{$search->id}}">フォロー</a></p>
<p class="follow-btn"><a href="/unfollow/{{$search->id}}">フォロー解除</a></p>
</div>
@endforeach
@endsection
