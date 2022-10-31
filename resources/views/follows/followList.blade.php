@extends('layouts.login')

@section('content')
  <div class="card post-area">
    <div class="card-haeder p-5 w-100 d-flex">
      <h3>Follow List</h3>
      @foreach ($users as $user)
      <a href="/users_profile/{{$user->id}}">
      <img src="{{ asset('storage/images/'. $user->images) }}" class="rounded-circle" width="50" height="50">
    </a>
      @endforeach
    </div>
  </div>
      @foreach ($posts as $post)
       <div class="card tweet">
         <div class="card-haeder p-3 w-100 d-flex">
           <div class="ml-2 d-flex ">
             <a href="/users_profile/{{$post->user->id}}">
               <img src="{{ asset('storage/images/'. $post->user->images) }}" class="rounded-circle" width="50" height="50"></a>
               <div>
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
      <p class="text-right">{{$post->created_at}}</p>
    </div>
    </div>
  </div>
</div>
@endforeach

@endsection
