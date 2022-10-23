@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/search']) !!}
  {{Form::token()}}
<div class="form-group">
  <div class="card-haeder p-3 w-100 d-flex">
    <div class="ml-2 d-flex ">

{!! Form::input('text', 'search', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
<input type ="image" name="submit" class="btn btn-primary" width="50" height="40" src="images/虫眼鏡.png">
</div>
<h5>検索ワード：{{session('search')}}</h5>

</div>
  {{Form::close()}}

      @foreach ($users as $user)
      <!-- ログインユーザー以外の表示 -->
      @if (Auth::id() != $user->id)
      <div class="inner">
        <div class="card-haeder p-3 d-flex">
          <img src="{{ asset('storage/images/'. $user->images) }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex ">
            <p>{{$user->username}}</p>
            <div class="users-follow-btn">
              @if (auth()->user()->isFollowing($user->id))
              <form action="/search/{{$user->id}}/unfollow">
              <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
            @else
            <form action="/search/{{$user->id}}/follow" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-info">フォローする</button>
            </form>
            @endif
            </div>
          </div>
        </div>
      </div>
        @endif
        @endforeach
      </div>
    </div>


@endsection
