@extends('layouts.logout')

@section('content')

<div id="clear"></div>
  <div class="added">
  <p class="added-username">{{session('username')}}さん</p>
  <p class="added-title">ようこそ！AtlasSNSへ！</p>
  <p class="added-message">ユーザー登録が完了しました。</p>
  <p class="go-login">早速ログインをしてみましょう。</p>

  <a href="/login">ログイン画面へ</a>
</div>
@endsection