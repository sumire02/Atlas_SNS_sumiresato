@extends('layouts.login')

@section('content')

    <div class="container">
      <img src="images/icon1.png">
        {!! Form::open(['url' => 'posts/create']) !!}
        {{Form::token()}}
        <div class="form-group">
            {!! Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容内容を入力してください。']) !!}
            <button> <img src="images/post.png"></button>
          </div>
        {!! Form::close() !!}
    </div>
    <div>
      <!-- 左が複数形(テーブル名)　右が単数(好きな文字で良い) -->
      @foreach ($posts as $post)
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->created_at}}</p>
      @endforeach
    </div>







@endsection
