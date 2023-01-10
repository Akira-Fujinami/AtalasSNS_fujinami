@extends('layouts.login')

@section('content')
@if(Auth::user()->images == "dawn.png")
<img src="images/icon1.png">
@else
<img src="{{asset('storage/'.Auth::user()->images)}}" class="icon">
@endif
<form action="{{url('/profile/update')}}" method="post" enctype="multipart/form-data">
@csrf
<ol>
<dd class="user-name">user name<input type="text" class="upname" name="upname" value="{{ old('upname',  Auth::user()->username) }}"></dd>
@if($errors->has('upname'))
			@foreach($errors->get('upname') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>mail address<input type="text" name="upmail" class="mail" value="{{ old('upmail',  Auth::user()->mail) }}"></dd>
@if($errors->has('upmail'))
			@foreach($errors->get('upmail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password<input type="password" name="upPW" ></dd>
@if($errors->has('upPW'))
			@foreach($errors->get('upPW') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password confirm<input type="password" name="upPW_confirmation"></dd>
@if($errors->has('upPW_confirmation'))
			@foreach($errors->get('upPW_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>bio<input type="text" name="upbio" value="{{ old('upbio',  Auth::user()->bio) }}"></dd>
@if($errors->has('upbio'))
			@foreach($errors->get('upbio') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</dd>
<dd>icon image<input type="file" name="image"></dd>
@if($errors->has('image'))
			@foreach($errors->get('image') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<button type="submit" class="btn-update">更新</button>
</form>
@endsection