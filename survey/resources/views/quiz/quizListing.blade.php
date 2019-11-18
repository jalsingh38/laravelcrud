@extends('layouts.app')
@section('content') 
<div class="container">
<style>
  .uper { 
    margin-top: 40px;
  }
  <meta name="csrf-token" content="{{ Session::token() }}"> 
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif 

          <form method="post" enctype="multipart/form-data" action="{{route('quiz_multidelete')}}">
            <div style="float: right">
            <button type="submit" class="btn btn-danger  btn-round d-block"> Delete Quiz</button>
          </div>
  <a id="buttn" class="btn btn-primary " href="{{ route('createQuiz')}}" >Add New</a>
</div><br>
  <div class="table-responsive">
        <table class="datatables-demo table table-striped table-bordered">
    <thead>
        <tr>
          <td></td>
          <td>Id</td>
          <td>Title</td>
          <td>Description</td>
          <td>Quiz Time</td>
          <td>Number Of Questions</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
      @foreach($Quiz_titles as $Quiz_title)
        <tr>
             <td><input type="checkbox" name="ids[]" value="{{ $Quiz_title->id}}"></td>
            <td>{{$Quiz_title->id}}</td>
            <td>{{$Quiz_title->title}}</td>
            <td>{{$Quiz_title->description}}</td>
            <td>{{$Quiz_title->time}}</td>
            @php $no_of_questions= App\Puzzle::where('titleId',$Quiz_title->id)->get(); @endphp
            <td>{{$no_of_questions->count()}}</td>
            
 
            <td width="15px">
                <a  class="btn btn-danger" href="{{ url('/deleteQuiz/'.$Quiz_title->id)}}" >
                 Delete</a> 
            </td>
            <td width="15px">
                <a  class="btn btn-primary" href="{{ url('/editQuiz/'.$Quiz_title->id)}}" >
                 Edit</a> 
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</form>
  <?php echo $Quiz_titles->render(); ?>
</div>
@endsection
