@extends('layouts.app')
@section('content')
<div class="container">
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Post
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" enctype="multipart/form-data" action="{{ route('posts.update', $post->id) }}">
      
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ old( 'title', $post->title) }}"/>
          </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{ old( 'description', $post->description) }}</textarea>
              </div>
              <div lass="form-group">
          <img src="{{url('/images/')}}/{{$post->image}}" width="100" height="100" />
             </div><br>
          <div class="form-group">
               <input type="file" name="image" />
              </div>
                      <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
  </div>
</div>
</div>
@endsection