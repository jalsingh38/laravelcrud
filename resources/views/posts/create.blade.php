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
    Add Post
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
      <form method="post" enctype="multipart/form-data" action="{{ route('posts.index') }}">
        <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
          <div class="form-group">
              @csrf
              <label for="title">Title:</label>
              <input type="texta" class="form-control" name="title" value="{{ old('title') }}"/>
          </div>
           <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
    </div>
         
           <div class="form-group">
  <label >Select Image</label> 
   <input type="file" name="image" value="{{ old('title') }}" />
  </div>
          <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
  </div>
</div>
</div>
@endsection