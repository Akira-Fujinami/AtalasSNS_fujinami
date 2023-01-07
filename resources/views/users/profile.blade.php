@extends('layouts.login')

@section('content')
<form action="{{url('/profile/update')}}" method="post">
@csrf
<ol>
<input type="hidden" name="id">
<dd>user name<input type="text" name="upname" value="{{ old('upname',  Auth::user()->username) }}"></dd>
@if($errors->has('upname'))
			@foreach($errors->get('upname') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>mail address<input type="text" name="upmail" value="{{ old('upmail',  Auth::user()->mail) }}"></dd>
@if($errors->has('upmail'))
			@foreach($errors->get('upmail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password<input type="text" name="upPW" ></dd>
@if($errors->has('upPW'))
			@foreach($errors->get('upPW') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password confirm<input type="text" name="upPW_confirmation"></dd>
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
<button type="submit" class="btn btn-success pull-right">更新</button>
{!! Form::close() !!}
@endsection