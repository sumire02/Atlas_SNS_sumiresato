@extends('layouts.login')

@section('content')
  <div class="card">
    <div class="card-haeder p-3 w-100 d-flex">
      <h3>Followed List</h3>
      <a href="/users_profile">
      <img src="{{ asset('images/icon.png/') }}" class="rounded-circle" width="50" height="50"></a>
    </div>
    </div>
          @foreach ($posts as $post)
       <div class="card">
         <div class="card-haeder p-3 w-100 d-flex">
           <div class="ml-2 d-flex ">
             <a href="/users_profile/{id}">
             <img src="{{ asset('images/icon.png/') }}" class="rounded-circle" width="50" height="50"></a>
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p>{{$post->created_at}}</p>
    </div>
  </div>
</div>
@endforeach


@endsection
