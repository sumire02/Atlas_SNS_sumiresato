@extends('layouts.login')

@section('content')
<div class="card-haeder p-5 w-100 d-flex">
  <br><img src="{{ asset('images/icon.png/') }}" class="rounded-circle" width="50" height="50">
  name {{$user->username}}</br>
    <br>bio {{$user->bio}}</br>
          <div class="ml-2 d-flex ">
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
@foreach ($post as $post)
<div class="col-md-8 mb-3">
      <div class="card">
         <div class="card-haeder p-3 w-100 d-flex">
           <div class="ml-2 d-flex ">
             <img src="{{ asset('storage/app/public/images.png') }}" class="rounded-circle" width="50" height="50">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->created_at}}</p>
    </div>
  </div>
</div>
</div>
@endforeach


@endsection