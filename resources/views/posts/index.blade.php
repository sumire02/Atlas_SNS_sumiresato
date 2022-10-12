@extends('layouts.login')

@section('content')
    <div class="container">
      <img name="submit" width="50" height="50" src="{{ asset('storage/images/'. Auth::user()->images) }}">
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
      @if (Auth::id() === $post->user_id || auth()->user()->isFollowing($post->user->id))
      <div class="card">
         <div class="card-haeder p-3 w-100 d-flex">
           <div class="ml-2 d-flex ">
      <img width="50" height="50" src="{{ asset('storage/images/'. $post->user->images) }}">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->created_at}}</p>
      @if (Auth::id() === $post->user_id)
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input type ="image" name="submit" width="50" height="50" src="images/edit.png"></a>
      <a href="/post/{{$post->id}}/delete"><input type ="image" name="submit" width="60" height="60" src="images/trash-h.png"></a>
      @endif
    </div>
  </div>
</div>
@endif
@endforeach
    </div>


   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="posts/{id}/update" method="post">
                <textarea name="posts" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="id">
                <input type ="image" name="submit" width="60" height="60" src="images/edit.png">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top">閉じる</a>
        </div>
    </div>








@endsection
