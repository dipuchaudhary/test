@extends('layouts.app')

@section('content')
    <div class="container" style="margin-left: 250px">
        <div class="card" style="width: 500px;">
            <div class="card-body" >
                <h2 class="card-title text-center text-primary">Login Here</h2>
                <form method="post" action="{{route('post-signIn')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
