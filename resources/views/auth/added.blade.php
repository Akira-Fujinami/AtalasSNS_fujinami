@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added">
  <h10>{{session('username')}}さん</h10>
  <h11>ようこそ！AtlasSNSへ！</h11>
  <h12>ユーザー登録が完了しました。</h12>
  <h13>早速ログインをしてみましょう。</h13>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>
</div>
@endsection