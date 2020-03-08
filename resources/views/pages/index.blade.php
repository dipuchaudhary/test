@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>This is the laravel series from scratch.</p>
        <br><br>
       <p><a href="/signin" class="btn btn-lg btn-success" role="button">Login</a>  <a href="/signup" class="btn btn-lg btn-primary" role="button">Register</a></p>


</div>

@endsection



