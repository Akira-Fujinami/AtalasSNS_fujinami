@extends('layouts.logout')
@section('content')
    <div id="register"></div>
    {!! Form::open(['url' => 'register']) !!}
        <div class="new-register">新規ユーザー登録
        </div>
	    {{ Form::label('username','',['class'=>'username']) }}
        {{ Form::text('username',null,['class' => 'inputer-name']) }}
        <div class="message-name">
		    @if($errors->has('username'))
			    @foreach($errors->get('username') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
        {{ Form::label('mail address','',['class'=>'mail']) }}
        {{ Form::text('mail_address',null,['class' => 'inputer-mail']) }}
        <div class="message-mail">
		    @if($errors->has('mail_address'))
			    @foreach($errors->get('mail_address') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif  
        </div>
        {{ Form::label('password','',['class'=>'password']) }}
        {{ Form::password('password',['class' => 'inputer-password']) }}
        <div class="message-password">
		    @if($errors->has('password'))
			    @foreach($errors->get('password') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
        {{ Form::label('password_confirmation','',['class'=>'password-confirmation']) }}
        {{ Form::password('password_confirmation',['class' => 'inputer-confirmation']) }}
        <div class="message-confirmation">
		    @if($errors->has('password_confirmation'))
			    @foreach($errors->get('password_confirmation') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
        {{ Form::submit('REGISTER',['class'=>'outpter']) }}
        <div class="back-login"><a href="/login">ログイン画面へ戻る</a>
	    </div>
    {!! Form::close() !!}
@endsection
