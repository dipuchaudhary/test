@extends('layouts.app')
@section('content')
    <div class="container">
    <h3>{{$post->title}}</h3>
    <p>{!! $post->body !!}</p>

    <hr>
    <small>Written on {{$post->created_at}}</small>
    <br><br>

    <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a> 
    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
        @csrf
        @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    </div>

    
@endsection