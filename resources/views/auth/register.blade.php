@extends('layouts.logout')

@section('content')
    <div id="register"></div>
    {!! Form::open(['url' => 'register']) !!}
    <h2>新規ユーザー登録</h2>
    {{ Form::label('username','',['class'=>'username']) }}
    <div class="top-message">
        {{ Form::text('username',null,['class' => 'inputer']) }}
        <div class="message">
		    @if($errors->has('username'))
			    @foreach($errors->get('username') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
        {{ Form::label('mail address','',['class'=>'mail']) }}
        {{ Form::text('mail_address',null,['class' => 'inputer']) }}
        <div class="message">
		    @if($errors->has('mail_address'))
			    @foreach($errors->get('mail_address') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif  
        </div>
        {{ Form::label('password','',['class'=>'password']) }}
        {{ Form::password('password',['class' => 'inputer']) }}
        <div class="message">
		    @if($errors->has('password'))
			    @foreach($errors->get('password') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
        {{ Form::label('password_confirmation','',['class'=>'password']) }}
        {{ Form::password('password_confirmation',['class' => 'inputer']) }}
        <div class="message">
		    @if($errors->has('password_confirmation'))
			    @foreach($errors->get('password_confirmation') as $message)
				    {{ $message }}<br>
			    @endforeach
		    @endif 
        </div>
    </div>
    {{ Form::submit('REGISTER',['class'=>'outpter']) }}
    <h6><a href="/login">ログイン画面へ戻る</a></h6>
    {!! Form::close() !!}
@endsection
