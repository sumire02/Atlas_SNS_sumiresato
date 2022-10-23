@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ $name }}さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <!-- ボタンの時 -->
  <p><button type="button" class="btn btn-danger"><a href="/login">ログイン画面へ</a></button></p>

</div>

@endsection
