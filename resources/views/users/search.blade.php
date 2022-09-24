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
      <div class="card">
        <div class="card-haeder p-3 w-100 d-flex">
          <img src="{{ $user->images }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex ">
            <p>{{$user->username}}</p>
            <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
            <div class="users-follow-btn">
              {{Form::submit(' フォローする ', ['class'=>'btn btn-info'])}}
            </div>
            @if (auth()->users()->isFollowed($user->id))
            <div class="px-2">
              <span class="px-1 bg-secondary text-light">フォローされています</span>
            </div>
            @endif
            <div class="d-flex justify-content-end flex-grow-1">
              @if (auth()->users()->isFollowing($user->id))
              <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">フォロー解除</button>
              </form>
              @else
              <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">フォローする</button>
              </form>
              @endif

          </div>
        </div>
      </div>
      @endforeach

    </div>


@endsection
