@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
</div>
		@if($errors->has('username'))
			@foreach($errors->get('username') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
    <div>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
		@if($errors->has('mail'))
			@foreach($errors->get('mail') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
    <div>

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}
</div>
		@if($errors->has('password'))
			@foreach($errors->get('password') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
    <div>

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>
		@if($errors->has('password_confirmation'))
			@foreach($errors->get('password_confirmation') as $message)
				{{ $message }}<br>
			@endforeach
		@endif 
    <div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
