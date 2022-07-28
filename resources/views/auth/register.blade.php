@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

public function store((Request $request)
{
    $validated = $request->validate([
        'username' => 'required|unique:posts|max:12',
        'mail' => 'required|max:40',
        'password' => 'required|max:20',
        'password-confirm' => 'required|max:20',
    ]);
}


{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

@endsection
