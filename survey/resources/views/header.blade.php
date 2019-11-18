<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ url('front/css/style.css') }}">

    </head>
    <body>

        <header class="navbar">
            <div class="navbar_content">
                <a href="" class="logo nav-brand">
                    <img src="{{ url('front/images/logo.png') }}" class="img-fluid">
                </a>

                <ul class="list-inline text-right">
                    <li class="list-inline-item"><a href="" class="nav-link"><i class="fa fa-heart-o"></i> Favorites</a></li>
                    <li class="list-inline-item"><a href="" class="nav-link">Partners</a></li>
                    <li class="list-inline-item"><a href="" class="nav-link">Log in</a></li>
                    <li class="list-inline-item"><a href="" class="btn btn-first"><i class="fa fa-user-o"></i> Sign up</a></li>
                </ul>
            </div>
        </header>
