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
    var fieldHTML = ' <div></br><div class="form-group"><label for="question">Question:</label><input type="textarea" class="form-control" name="question[]" value="{{old('question')}}"/></div><div class="form-group"><label for="options">Answer Options:</label> <textarea class="form-control"  id="options" name="options[]" row="3">{{old('options')}}</textarea></div><div class="form-group"><label for="right_answer">Right Answer:</label><input type="textarea" class="form-control" name="right_answer[]" value="{{old('right_answer')}}"/></div>Remove quiz</label><a style="float:right" href="javascript:void(0);" class="remove_field_button"><img width="35" height="35" src="{{url('/images/icon/remove_icon.png')}}"/></a></div></div>'; //New input field html 
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
    
<div class="card uper">
  
  <div class="card-header">
    Add Quiz
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
      <form method="post" enctype="multipart/form-data" action="{{route('updateQuiz')}}">
        <input type="hidden" name="added_by" value="{{Auth::user()->id}}">
        <input type="hidden" name="id" value="{{$quiz_title->id}}">
          <div class="form-group">
              @csrf

              <label for="title">Title:</label>
              <input type="textarea" class="form-control" name="title" value="{{$quiz_title->title}}"/>
          </div>
           <div class="form-group">
              @csrf
              <label for="description">Description:</label>
              <input type="textarea" class="form-control" name="description" value="{{$quiz_title->description}}"/>
          </div>
           <div class="form-group">
              @csrf
              <label for="time">Quiz Time:</label>
              <input type="text" class="form-control" name="time" value="{{$quiz_title->time}}"/>
          </div>
           @php $puzzles=App\Puzzle::where('is_deleted',0)->where('titleId',$quiz_title->id)->get(); @endphp
               @foreach($puzzles as $puzzle)
           <div class="form-group">
                <label for="question">Question:</label>
               <input type="textarea" class="form-control" name="question[]" value="{{$puzzle['question']}}"/>
              </div>
          <div class="form-group">
                <label for="options">Answer Options:</label>
                <textarea class="form-control"  id="options" name="options[]" row="3">{{$puzzle->options}}</textarea>
              </div>
          
           <div class="form-group">
                <label for="right_answer">Right Answer:</label>
               <input type="textarea" class="form-control" name="right_answer[]" value="{{$puzzle->right_answer}}"/>
              </div>
              @endforeach
            <div class="form-group">
               <div class="field_wrapper">
               <label >Add More:</label>
               <a style="float:right" href="javascript:void(0);" class="add_field_button" title="Add More"><img  width="25" height="25"  src="{{url('/images/icon/add_icon.png')}}"/></a>
            </div>
           </div>
             
          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>

@endsection