@extends('layouts.app')
@section('content')


<div class="container">

<div class="heading_font">
<div class="card">
  <div class="card-header">
   <h1>{{$survey_basic->title}}</h1>
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$survey_basic->description}}</h5>
    @php $i=1; @endphp
    @foreach($survey_questions as $survey_question)
    <br><label class="form-group"><b>Question {{$i}}:</b></label>
    {{$survey_question->question}} <br>

    @php
    if($survey_question->question_type == 'dropdown'){
		    $dropdown=explode(',',$survey_question->options);@endphp
        <label class="form-group"><b>Select Answer:</b></label><br>
		    <select class="custom-select">
		    @php foreach($dropdown as $drop){ @endphp
		    <option value="{{$drop}}">{{$drop}}</option>
		    @php } @endphp
		    </select><br>
	@php }
    @endphp
    @php
    if($survey_question->question_type == 'radio'){
		  $radio_options=explode(',',$survey_question->options);@endphp
      <label class="form-group"><b>Select Answer:</b></label></br>   
     @php foreach($radio_options as $radio_option){ @endphp
      <input type="radio" name="radio_option" value="{{$radio_option}}" > {{$radio_option}}<br>
       @php } 
     }
    @endphp
     @php
    if($survey_question->question_type == 'checkbox'){
		    $checkbox_options=explode(',',$survey_question->options);@endphp
       <label class="form-group"><b>Select Answer:</b></label></br>   
       @php foreach($checkbox_options as $checkbox_option){ @endphp
       <input type="checkbox" name="checkbox_option[]" value="{{$checkbox_option}}" > {{$checkbox_option}}<br>
       @php } 
		   
	}
    @endphp
    @php
    if($survey_question->question_type == 'text'){
		   echo '<label class="form-group"><b>Write Your Answer Here:</b></label></br><input type="text" name="answer_text" class="form-control"/>';
		
	}
  $i=$i+1;
    @endphp
    @endforeach
  </div>

</div>
 </div>
</div>
 
@endsection
<style type="text/css">
       
   <?php echo $survey_basic->custom_css ?>
</style>