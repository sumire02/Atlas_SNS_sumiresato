@extends('layouts.login')

@section('content')
  <div class="card post-area">
    <div class="card-haeder p-5 w-100 d-flex">
      <img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="rounded-circle" width="50" height="50">
        {!! Form::open(['url' => 'posts/create']) !!}
        {{Form::token()}}
            {!! Form::input('text', 'post', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
            <input class = "post-right" type ="image" name="submit" width="100" height="100" src="images/post.png">
</div>
        {!! Form::close() !!}
    </div>
    <div>
      <!-- 左が複数形(テーブル名)　右が単数(好きな文字で良い) -->
      @foreach ($posts as $post)
      @if (Auth::id() === $post->user_id || auth()->user()->isFollowing($post->user->id))
      <div class="card tweet">
         <div class="card-haeder p-3 w-100 d-flex">
           <div class="ml-2 d-flex ">
      <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50">
      <div>
      <p>{{$post->user->username}}</p>
      <p><br>{{$post->post}}</p>
      <p class="text-right">{{$post->created_at}}</p>
    </div>
      @if (Auth::id() === $post->user_id)
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><input class ="edit-right" type ="image" name="submit" width="50" height="50" src="images/edit.png"></a>
      <a href="/post/{{$post->id}}/delete">
        <input class = "trash-right" type ="image" name="submit" width="60" height="60" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" src="images/trash-h.png"></a>
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
