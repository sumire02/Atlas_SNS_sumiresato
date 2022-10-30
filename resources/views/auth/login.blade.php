@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="login">

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'form-control']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'form-control']) }}

{{ Form::submit('LOGIN',['class' =>'btn btn-danger']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}


@endsection
