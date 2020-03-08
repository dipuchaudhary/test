@extends('layouts.app')
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
@section('content')
<br>
<h1>Create Post</h1>
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="title">
    </div>
    
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="editor" name="body" rows="3"></textarea>
    </div>

    <div class="form-group">
        <input type="file" class="form-control-file" id="file" name="cover_image">
      </div>

    <input type="submit" class="btn btn-primary" value="Submit">
  </form>
  <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
    
@endsection
