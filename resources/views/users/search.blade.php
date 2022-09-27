@extends('layouts.login')

@section('content')
<div class="container">
  {!! Form::open(['url' => '/search']) !!}
  {{Form::token()}}
<div class="form-group">
{!! Form::input('text', 'search', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
<input type="submit" value="" class="btn btn-primary" >
</div>
  {{Form::close()}}
<p>検索ワード：{{session('search')}}</p>


      @foreach ($users as $user)
      <!-- ログインユーザー以外の表示 -->
      @if (Auth::id() != $user->id)
      <div class="card">
        <div class="card-haeder p-3 w-100 d-flex">
          <img src="{{ $user->images }}" class="rounded-circle" width="50" height="50">
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


@endsection
