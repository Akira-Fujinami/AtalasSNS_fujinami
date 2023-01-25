@extends('layouts.login')

@section('content')
@if(Auth::user()->images == "dawn.png")
<img src="images/icon1.png" class="icon98">
@else
<img src="{{asset('storage/'.Auth::user()->images)}}" class="icon">
@endif
<form action="{{url('/profile/update')}}" method="post" enctype="multipart/form-data">
@csrf
<ol>
	<div class="form-update">
<dd class="user-name">user name<input type="text" class="input" name="user_name" value="{{ old('user_name',  Auth::user()->username) }}"></dd>
@if($errors->has('user_name'))
			@foreach($errors->get('user_name') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">mail address<input type="text" name="mail_address" class="input" value="{{ old('mail_address',  Auth::user()->mail) }}"></dd>
@if($errors->has('mail_address'))
			@foreach($errors->get('mail_address') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">password<input type="password" class="input" name="password" ></dd>
@if($errors->has('password'))
			@foreach($errors->get('password') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">password confirmation<input type="password" class="input" name="password_confirmation"></dd>
@if($errors->has('password_confirmation'))
			@foreach($errors->get('password_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">bio<textarea name="bio">{{Auth::user()->bio}}</textarea></dd>
@if($errors->has('bio'))
			@foreach($errors->get('bio') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</dd>
<dd class="user-name">icon image<input type="file" name="image" class="file"></dd>
@if($errors->has('image'))
			@foreach($errors->get('image') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<button type="submit" class="btn-update">更新</button>
</div>
</form>
@endsection