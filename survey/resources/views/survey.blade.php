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
  <a id="buttn" class="btn btn-primary" href="{{ route('storeSurvey')}}" >Add New</a>
</div><br>
  <div class="table-responsive">
        <table class="datatables-demo table table-striped table-bordered">
    <thead>
        <tr>
          <td>Id</td>
          <td>Title</td>
          <td>Description</td>
          <td colspan="3" width="5px">Action</td>
        </tr>
    </thead>
    <tbody>
      @foreach($surveys as $survey)
        <tr>
            <td>{{$survey->id}}</td>
            <td>{{$survey->title}}</td>
            <td>{{$survey->description}}</td>
            

            <td width="15px">
                <a  class="btn btn-success" href="{{ url('/surveyFormView/'.base64_encode($survey->id))}}" >
                 View</a>
                  <td width="15px">
                <a  class="btn btn-danger" href="{{ url('/deleteSurvey/'.base64_encode($survey->id))}}" >
                 Delete</a> 
            </td>
            <td width="15px">
                <a  class="btn btn-primary" href="{{ url('/surveyEdit/'.base64_encode($survey->id))}}" >
                 Edit</a> 
            </td> </td>
            
        </tr>
        @endforeach
    </tbody>
  </table>
  <?php echo $surveys->render(); ?>
</div>
<!-- <script type="text/javascript">

         jQuery(document).ready(function(){

          jQuery('#billing_list').DataTable( {
            responsive: true
        } );
        });
  
      </script> -->
@endsection
