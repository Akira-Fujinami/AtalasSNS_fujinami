@extends('layouts.login')

@section('content')
<div class="container">
    {!!Form::open(['url' => '/post'])!!}
<div class="post">
<p><img src="images/post.png"></p>
</div>
<div class="my-icon">
    <h5><img src="images/icon1.png"></h5></div>
</div>
<div class="form-group">
{!!Form::input('text','newPost','',['required','class'=>'form-control','placeholder'=>'投稿内容を入力してください。'])!!}
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png"></button>
</div>
{!!Form::close()!!}
@foreach ($list as $list)
<div>
<tr>
<td>{{ $list->post }}</td>
<td>{{$list->created_at}}</td>
<td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか。')"><img src="images/trash.png"></a></td>
        <!-- 投稿の編集ボタン -->
        <td><a class="js-modal-open" href="/top/{{$list->id}}/" post="{{ $list->post }}" id="{{ $list->id }}"><img src="images/edit.png"></a></td>
   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
        {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $list->id) !!}
            {!! Form::input('text', 'upPost', $list->post, ['required', 'class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right"><img src="images/edit.png"></button>
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
