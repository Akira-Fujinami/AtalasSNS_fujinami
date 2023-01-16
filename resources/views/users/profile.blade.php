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
<dd class="user-name">user name<input type="text" class="input" name="upname" value="{{ old('upname',  Auth::user()->username) }}"></dd>
@if($errors->has('upname'))
			@foreach($errors->get('upname') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">mail address<input type="text" name="upmail" class="input" value="{{ old('upmail',  Auth::user()->mail) }}"></dd>
@if($errors->has('upmail'))
			@foreach($errors->get('upmail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">password<input type="password" class="input" name="upPW" ></dd>
@if($errors->has('upPW'))
			@foreach($errors->get('upPW') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">password confirm<input type="password" class="input" name="upPW_confirmation"></dd>
@if($errors->has('upPW_confirmation'))
			@foreach($errors->get('upPW_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd class="user-name">bio<textarea name="upbio">{{Auth::user()->bio}}</textarea></dd>
@if($errors->has('upbio'))
			@foreach($errors->get('upbio') as $message)
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