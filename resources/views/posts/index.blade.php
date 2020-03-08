@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    <a class="btn btn-primary" role="button" href="/posts/create">Create post</a>
    <br><br>
    @if(count($posts)>0)
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small class="card-text">Written on {{$post->created_at}}</small>
            </div> 
        </div>
        @endforeach
        <br>
        {{ $posts->links() }}
    @else
        <p>No post Found</p>
    @endif
@endsection