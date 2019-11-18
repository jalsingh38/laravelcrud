@extends('layouts.app')
@section('content') 
<div class="container">
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
<div class="card uper">
  
  <div class="card-header">
    Add Survey Form
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
      <form method="post" enctype="multipart/form-data" action="{{route('createSurvey')}}">
        <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
          <div class="form-group">
              @csrf
              <label for="title">Form Title:</label>
              <input type="textarea" class="form-control" name="title" value="{{old('title')}}"/>
          </div>
           <div class="form-group">
                <label for="description">Form Description:</label>
                <textarea class="form-control"  id="description" name="description" row="3">{{old('description')}}</textarea>
              </div>

          <div class="form-group">
                <label for="custom_css">Form Custom CSS:</label>
                <textarea class="form-control"  id="custom_css" name="custom_css" row="3">{{old('custom_css')}}</textarea>
              </div>
         

             
           <label ><b>Step 1 Out of 2</b></label> <br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>

@endsection