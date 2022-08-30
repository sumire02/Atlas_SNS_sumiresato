@extends('layouts.login')

@section('content')

    <div class="container">
      <img src="images/icon1.png">
        {!! Form::open(['url' => 'posts/create']) !!}
        {{Form::token()}}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容内容を入力してください。']) !!}
            <button> <img src="images/post.png"></button>
          </div>
        {!! Form::close() !!}
    </div>






@endsection
