<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" >

        
        <title>IT SYSTEM - @yield('title') </title>

    </head>
    <body>
    @include('include.navbar-user')
        <div class="row">
            <div class="col-md-12">
                @include('include.messages')
            </div>
            @yield('body')
        </div>
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/action.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ajax.js')}}"></script>
    </body>
</html>
