@extends('layouts.login')

@section('content')
    <div id="top-bar-index">
        <form action="{{url('/post')}}" method="POST">
            @csrf
            @if(Auth::user()->images == "dawn.png")
                <div class="user-icon">
                    <img src="{{asset('images/icon1.png')}}" alt="ログインしているユーザーのアイコン">
                </div>
            @else
                <div>
                    <img src="{{asset('storage/'.Auth::user()->images)}}" alt="ログインしているユーザーのアイコン" class="post-image">
                </div>
            @endif
            <input type="text" maxlength="150" class="posts-text" name="newPost" required placeholder="投稿内容を入力してください。">
            <input type="image" class="post" src="images/post.png" alt="post">
        </form>
    </div>
    @foreach ($list as $list)
        <div id="center-bar">
            @if($list->user->images == "dawn.png")
                <div class="user-post-icon">
                    <img src="{{asset('images/icon1.png')}}" alt="ログインしているユーザーのアイコンかフォロー中のアイコン">
                </div>
            @else
                <div>
                    <img src="{{asset('storage/'.$list->user->images)}}" alt="ログインしているユーザーのアイコンかフォロー中のアイコン" class="user-post-image">
                </div>
            @endif
            <div class="posting">
                <div class="post-username">{{$list->user->username}}
                </div>
                <div class="post-create">{{$list->created_at}}
                </div>
                <div class="post-post">{{ $list->post }}
                </div>
            </div>
            @if($list->user->username == Auth::user()->username)
                <div class="btn">
                    <a href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか。')">
                        <img src="images/trash-h.png" alt="削除ボタン">
                    </a>
                </div>        
<!-- 投稿の編集ボタン -->
                <a class="js-modal-open image" href="/top/{{$list->id}}/" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="images/edit.png" alt="編集ボタン"></a>
        <!-- モーダルの中身 -->
                <div class="modal js-modal">
                    <div class="modal__bg js-modal-close"></div>
                    <div class="modal__content">
                        {!! Form::open(['url' => '/post/update']) !!}
                            <div class="form-grouping">
                                {!! Form::hidden('id', '',['class'=>'modal_id']) !!}
                                {!! Form::input('text', 'upPost', '', ['required', 'class' => 'modal_post','maxlength' => 150]) !!}
                            </div>
                            <input type="image" class="update" src="images/edit.png" alt="編集ボタン">
                        {!! Form::close() !!}
                        {{ csrf_field() }}
                        <a class="js-modal-close" href="/top"></a>
                    </div>
                </div>
            @else
            @endif
        </div>
    @endforeach
@endsection
