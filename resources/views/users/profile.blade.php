@extends('layouts.login')

@section('content')
    <div class="card w-50 mx-auto m-5">
        <div class="card-body">
            <div class="pt-2">
                <p class="h3 border-bottom border-secondary pb-3"></p>
            </div>
            {!! Form::open(['route' => ['profile_edit'], 'method', 'files'=> true]) !!}
            {!! Form::hidden('id',$users->id) !!}
            <div class="m-3">
              <!-- name -->
                <div class="form-group pt-1" >
                    {{Form::label('name','username')}}
                    {{Form::text('name', $users->username, ['class' => 'form-control', 'id' =>'name'])}}
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <!-- mail -->
                <div class="form-group pt-2">
                    {{Form::label('email','mail adress')}}
                    {{Form::email('email', $users->mail, ['class' => 'form-control', 'id' =>'email'])}}
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <!-- password -->
                <div class="form-group pt-3">
                    {{Form::label('password','password')}}
                    {{Form::text('password', '', ['class' => 'form-control', 'id' =>'password'],)}}
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <!-- password comfirm -->
                <div class="form-group pt-4">
                    {{Form::label('password_comfirm','password comfirm')}}
                    {{Form::text('password_comfirm', $users->password_comfirm, ['class' => 'form-control', 'id' =>'password_comfirm'])}}
                    <span class="text-danger">{{$errors->first('password_comfirm')}}</span>
                </div>
                <!-- bio -->
                <div class="form-group pt-5">
                    {{Form::label('bio','bio')}}
                    {{Form::text('bio', $users->bio, ['class' => 'form-control', 'id' =>'bio'])}}
                    <span class="text-danger">{{$errors->first('bio')}}</span>
                </div>
                <!-- icon -->
                <div class="form-group pt-6">
                    {{Form::label('images','icon imagi')}}
                    <div>
                    <input type="file" name="images">
                    <span class="text-danger">{{$errors->first('images')}}</span>
                  </div>
                </div>
                <div class="form-group pull-right">
                    {{Form::submit(' 更新 ', ['class'=>'btn btn-danger rounded-pill'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
                    {!! Form::close() !!}
    @if ($errors->any())
        <script src="{{ asset('js/modal.js') }}"></script>
    @endif
@endsection
