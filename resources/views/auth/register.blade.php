@extends('layouts.logout')

@section('content')
<div id="register">
{!! Form::open(['url' => 'register']) !!}
<h2>新規ユーザー登録</h2>

{{ Form::label('username','',['class'=>'username']) }}
<div class="message">
{{ Form::text('username',null,['class' => 'inputer']) }}
		@if($errors->has('username'))
			@foreach($errors->get('username') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</div>

{{ Form::label('mail address','',['class'=>'username']) }}
<div class="message">
{{ Form::text('mail',null,['class' => 'inputer']) }}
		@if($errors->has('mail'))
			@foreach($errors->get('mail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</div>

{{ Form::label('password','',['class'=>'username']) }}
<div class="message">
{{ Form::password('password',['class' => 'inputer']) }}
		@if($errors->has('password'))
			@foreach($errors->get('password') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</div>

{{ Form::label('password_confirmation','',['class'=>'username']) }}
<div class="message">
{{ Form::password('password_confirmation',['class' => 'inputer']) }}
		@if($errors->has('password_confirmation'))
			@foreach($errors->get('password_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
</div>


{{ Form::submit('register',['class'=>'outpter']) }}

<h7><a href="/login">ログイン画面へ戻る</a></h7>

{!! Form::close() !!}

</div>
@endsection
