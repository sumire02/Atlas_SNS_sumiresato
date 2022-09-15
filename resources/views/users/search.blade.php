@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/search']) !!}
  {{Form::token()}}
<div class="form-group">
{!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
<input type="submit" value="" class="btn btn-primary" >
</div>

<p>検索ワード：{{session('search')}}</p>


      @foreach ($users as $user)
      <p>{{$user->username}}</p>
      @endforeach

    </div>


@endsection
