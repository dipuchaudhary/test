@extends('layouts.app')
@section('content')
    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
       @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>

    @endif
    <form action="{{route('form.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
            @error('name')
                <div class="text-danger">
                    <small class="form-text">{{$message}}</small>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
            @error('email')
            <div class="text-danger">
                <small class="form-text">{{$message}}</small>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" name="address" id="password" placeholder="Address" value="{{old('address')}}">
            @error('address')
            <div class="text-danger">
                <small class="form-text">{{$message}}</small>
            </div>
            @enderror
        </div>
        <div class="form-group phone_field">
            <label>Phone</label>
            <input type="number" name="phone[]" class="form-control" id="phone"  placeholder="phone" value="{{old('phone[]')}}"><a href="javascript:void (0);" class="add_button"><i class="fa fa-plus-circle"></i></a>
            @error('phone')
            <div class="text-danger">
                <small class="form-text">{{$message}}</small>
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
