<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favico.ico') }}">
    <link rel="icon" href="{{ asset('favico.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <link href="{{ asset('theme/css/bootstrap-fileupload.min.css') }}" rel="stylesheet" />
    @yield('extracss')
</head>
