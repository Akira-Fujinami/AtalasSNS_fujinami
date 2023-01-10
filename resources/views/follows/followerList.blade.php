@extends('layouts.login')

@section('content')

<div id="top-bar-followlist">
<h1>followerlist</h1>
    @foreach($usered as $usered)
<td>
    @if($usered->images == "dawn.png")
<img src="images/icon1.png">
@else
<img src="{{asset('storage/'.$usered->images)}}" class="icon">

@endif
</td>
@endforeach
</div>
@endsection