@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}
<div class="login">
<p>AtlasSNSへようこそ</p>

{{ Form::label('email') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン',['class'=>'output'])}}

<h4 class="register"><a href="/register">新規ユーザーの方はこちら</a></h4></div>

{!! Form::close() !!}

@endsection