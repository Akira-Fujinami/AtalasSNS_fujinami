@extends('layouts.login')

@section('content')
@foreach ($user as $user)
{!! Form::open(['url' => '/profile/update']) !!}
<ol>
{!! Form::hidden('id', $user->id) !!}
<dd>user name{!! Form::input('text', 'upname',  Auth::user()->username , ['required', 'class' => 'form-control']) !!}</dd>
		@if($errors->has('upname'))
			@foreach($errors->get('upname') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>mail address{!! Form::input('text', 'upmail',  Auth::user()->mail , ['required', 'class' => 'form-control']) !!}</dd>
		@if($errors->has('upmail'))
			@foreach($errors->get('upmail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password{!! Form::input('password', 'upPW',  '' , ['class' => 'form-control']) !!}</dd>
		@if($errors->has('upPW'))
			@foreach($errors->get('upPW') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>password confirm{!! Form::input('password', 'upPW_confirmation',  '', ['class' => 'form-control']) !!}</dd>
		@if($errors->has('upPW_confirmation'))
			@foreach($errors->get('upPW_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
<dd>bio{!! Form::input('text', 'upbio',  Auth::user()->bio , ['class' => 'form-control']) !!}</dd>
		@if($errors->has('upbio'))
			@foreach($errors->get('upbio') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</dd>
<button type="submit" class="btn btn-success pull-right">更新</button>
{!! Form::close() !!}


@endforeach
@endsection