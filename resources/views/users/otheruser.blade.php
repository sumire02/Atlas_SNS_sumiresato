@extends('layouts.login')

@section('content')
{{$user->username}}
@foreach ($post as $post)
<div class="col-md-8 mb-3">
  <div class="card">
    <div class="card-haeder p-3 w-100 d-flex">
      <img src="{{ asset('images/icon.png/') }}" class="rounded-circle" width="50" height="50">
    </div>
  </div>
  {{$post->post}}
</div>
@endforeach


@endsection
