@extends('layouts.login')

@section('content')
<div class="container">
<form action="{{url('/post')}}" method="POST">
    @csrf
<div class="my-icon"></div>
</div>
<div class="form-group">
@if(Auth::user()->images == "dawn.png")
<img src="{{asset('images/icon1.png')}}" clas="icon-3">
@else
<img src="{{asset('storage/'.Auth::user()->images)}}" class="icon-4">
@endif
<input type="text" maxlength="150" class="text1" name="newPost" required placeholder="投稿内容を入力してください。">
<input type="image" class="post" src="images/post.png">
</form>
<div id="top-bar">
</div>
{!!Form::close()!!}
@foreach ($list as $list)
<tr>
<td class="post-username">
@if($list->user->images == "dawn.png")
<img src="{{asset('images/icon1.png')}}" clas="icon-3">
@else
<img src="{{asset('storage/'.$list->user->images)}}" class="icon-4">
@endif
<div id="center-bar">
    <div class="posting">
    <h8 class="posting-username">{{$list->user->username}}</td>
<td>{{$list->created_at}}</td>
</tr>
<div>
{{ $list->post }}
</div>
@if($list->user->username == Auth::user()->username)
<a class="btn btn-clear" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか。')"><img src="images/trash.png"></a>
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open update" href="/top/{{$list->id}}/" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="images/edit.png"></a></div>
        <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
        {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-grouping">
            {!! Form::hidden('id', '',['class'=>'modal_id']) !!}
            {!! Form::input('text', 'upPost', '', ['required', 'class' => 'modal_post']) !!}
        </div>
        <input type="image" class="update" src="images/edit.png">
        {!! Form::close() !!}
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top"></a>
        </div>
    </div>
    @else
    @endif
</tr>
</div></div></div>
<script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
@endforeach
@endsection
