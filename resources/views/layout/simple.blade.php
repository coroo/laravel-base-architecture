<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ env('APP_NAME'), 'Application Name' }}</title>
        <link rel="icon" 
            type="image/png" 
            href="/img/logo_aw.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class=" ">
        @yield('content')

        @include('layout.script')

        @stack('scripts')
    </body>
</html>