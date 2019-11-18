@extends('layouts.app')
@section('content') 
<!DOCTYPE html>
<html>
<head>
    <title>Import Or Export</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
           Import Or Export Excel File
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
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Post Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Post Data</a>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>
@endsection