@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
{!!Form::input('text','search','',['class'=>'search-username','placeholder'=>'ユーザー名'])!!}
<input type="image" class="search-image" src="images/post.png">
@if(!empty($result))
<span class="search-word">検索ワード：{{$result}}</span>
@endif
{!!Form::close()!!}
<div id="top-bar">
</div>
@foreach ($search as $search)
<div class="searching">
{{ $search->username }}
{{ $search->id }}
@if (Auth::user()->isFollowing($search->id))
                                   <form action="{{ ('/unfollow/{$search->id}') }}" method="POST">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
 
                                       <button type="submit" class="btn-unfollow">フォロー解除</button>
                                   </form>
                               @else
                                   <form action="{{ ('/follow/{$search->id}') }}" method="POST">
                                       {{ csrf_field() }}
 
                                       <button type="submit" class="btn-follow">フォローする</button>
                                   </form>
                               @endif

</div>
@endforeach
@endsection
