@extends('layouts.app')
@section('content') 
<div class="container">
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  
    

<script type="text/javascript">
    $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_field_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = ' <div><div class="form-group"> <label for="question"> Question:</label><input type="text" class="form-control" name="question[]"/></div><div class="form-group"> <label for="question_type"> Select Question Type:</label> <select  name="question_type[]" class="form-control"><option value="text"> Text Box</option><option value="radio"> Radio Buton</option><option value="checkbox"> Multiselect Checkbox</option><option value="dropdown"> Dropdown</option></select></div><div class="form-group">  <label for="options"> Options/Values:</label><input type="text" class="form-control" name="options[]"/></div><label>Remove Question</label><a style="float:right" href="javascript:void(0);" class="remove_field_button"><img width="35" height="35" src="{{url('/images/icon/remove_icon.png')}}"/></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_field_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
   
</script>
@php

@endphp
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
      <form method="post" enctype="multipart/form-data" action="{{route('createAdvancedSurvey')}}">
        <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
        <input type="hidden" name="survey_basic_id" value="{{$id}}">
          <div class="form-group">
              @csrf
              <label for="question">Question:</label>
              <input type="text" class="form-control" name="question[]" value="{{old('question')}}"/>
          </div>
          <div class="form-group">
              <label for="question_type"> Select Question Type:</label>
               <select  name="question_type[]" class="form-control">
                  <option value="text"> Text Box</option>
                  <option value="radio"> Radio Buton</option>
                  <option value="checkbox"> Multiselect Checkbox</option>
                  <option value="dropdown"> Dropdown</option>
                </select>
          </div>
            <div class="form-group">
             <label for="options"> Options/Values:</label>
             <input type="text" class="form-control" name="options[]" />
          </div>

             <div class="form-group">
               <div class="field_wrapper">
               <label >Add More:</label>
               <a style="float:right" href="javascript:void(0);" class="add_field_button" title="Add More"><img  width="25" height="25"  src="{{url('/images/icon/add_icon.png')}}"/></a>
            </div>
           </div>
           <label ><b>Step 2 Out of 2</b></label> <br>
          <button type="submit" class="btn btn-primary">Create Survey Form</button>
      </form>
  </div>
</div>
</div>

@endsection