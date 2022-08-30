@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ $username }}さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><button class="btn-danger"><a href="/login">ログイン画面へ</a></button></p>
</div>

@endsection
