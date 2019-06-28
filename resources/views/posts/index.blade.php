
@extends('layouts.app')
@section('content') 
<div class="container">
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif 
  <a id="buttn" class="btn btn-primary" href="{{ route('posts.create')}}" >Add New</a>
</div><br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Description</td>
          <td>Image</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td><img src="{{url('/images/')}}/{{$post->image}}" width="100" height="100" /></td>
            <td><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button  class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <?php echo $posts->render(); ?>
</div>
@endsection


