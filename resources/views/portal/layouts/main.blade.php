<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('portal.layouts.header')
            @include('portal.layouts.sidebar')
         </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris-data.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
