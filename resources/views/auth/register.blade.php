@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}




{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

@endsection
