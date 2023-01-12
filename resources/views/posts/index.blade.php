@extends('layouts.login')

@section('content')
<div class="container">
<form action="{{url('/post')}}" method="POST">
    @csrf
<div class="my-icon"></div>
</div>
<div class="form-group">
<input type="text" class="text1" name="newPost" required placeholder="投稿内容を入力してください。">
<input type="image" class="post" src="images/post.png">
</form>
</div>
<div id="top-bar">
</div>
{!!Form::close()!!}
@foreach ($list as $list)
<div class="posting">
<tr>
<td class="post-username">{{$list->user->username}}</td>
<td>{{$list->created_at}}</td>
</tr>
<div>
{{ $list->post }}<a class="btn btn-clear" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか。')"><img src="images/trash.png"></a>
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open update" href="/top/{{$list->id}}/" post="{{ $list->post }}" id="{{ $list->id }}"><img src="images/edit.png"></a></div>
        <div id="center-bar"></div>
        <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
        {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $list->id) !!}
            {!! Form::input('text', 'upPost', $list->post, ['required', 'class' => 'text2']) !!}
        </div>
        <input type="image" class="update" src="images/edit.png">
        {!! Form::close() !!}
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top"></a>
        </div>
    </div>
</tr>
</div>
<script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
@endforeach
@endsection
