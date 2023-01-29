@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}
<div class="login">
</div>
<p>AtlasSNSへようこそ</p>

{{ Form::label('mail_address','',['class' => 'mail-address']) }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password','',['class' => 'password-auth']) }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('Login',['class'=>'output'])}}
<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection