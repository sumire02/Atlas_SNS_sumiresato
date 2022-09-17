@extends('layouts.login')

@section('content')

    <div class="container">
      <input type ="image" name="submit" width="50" height="50" src="images/icon1.png">
        {!! Form::open(['url' => 'posts/create']) !!}
        {{Form::token()}}
        <div class="form-group">
            {!! Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容内容を入力してください。']) !!}
            <input type ="image" name="submit" width="100" height="100" src="images/post.png">
          </div>
        {!! Form::close() !!}
    </div>
    <div>
      <!-- 左が複数形(テーブル名)　右が単数(好きな文字で良い) -->
      @foreach ($posts as $post)
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->created_at}}</p>
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input type ="image" name="submit" width="50" height="50" src="images/edit.png"></a>
      <a href="/post/{{$post->id}}/delete"><input type ="image" name="submit" width="60" height="60" src="images/trash-h.png"></a>
      @endforeach
    </div>

   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="posts/{id}/update" method="post">
                <textarea name="posts" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="id">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top">閉じる</a>
        </div>
    </div>








@endsection
