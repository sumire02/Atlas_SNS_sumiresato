@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="login">

<p>新規ユーザー登録</p>
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'form-control']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'form-control']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'form-control']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'form-control']) }}




{{ Form::submit('REGISTER',['class' =>'btn btn-danger']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}

@endsection
