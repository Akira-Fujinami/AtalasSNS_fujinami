@extends('layouts.login')
@section('content')
{!! Form::open(['url' => '/search']) !!}
{!!Form::input('text','search','',['class'=>'form-control','placeholder'=>'ユーザー名'])!!}
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button>
{!!Form::close()!!}
<?php foreach($result as $result){ ?>
        <li><?php echo $result; ?></li>
        <?php } ?>
@foreach ($search as $search)
<div>
{{ $search->username }}
</div>
@endforeach
@endsection
