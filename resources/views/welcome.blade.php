<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HIER TEST</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('css/material-kit.css?v=2.1.0') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse" style="background:#266589;">

    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    {{-- @auth
                    <li class="nav-item" style="color:#FFF !important;">
                        <a class="nav-link" href="{{url('profile')}}" >
                            <i class="material-icons">person</i> Profile
                        </a>
                    </li>
                    @else --}}
                    <li class="nav-item" style="color:#FFF !important;">
                        <a class="nav-link" rel="tooltip"  href="{{url('practice_one')}}" >
                            <i class="material-icons">Find</i> Find repeated character
                        </a>
                    </li>
                    <li class="nav-item" style="color:#FFF !important;">
                        <a class="nav-link" rel="tooltip"  href="{{url('practice_two')}}" >
                            <i class="material-icons">Circle</i> Buble Sort
                        </a>
                    </li>
                    <li class="nav-item" style="color:#FFF !important;">
                        <a class="nav-link" rel="tooltip"  href="{{url('login')}}" >
                            <i class="material-icons">Bank</i> Bank
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header header-filter" data-parallax="true" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="title" style="color:#FFF !important;">WELCOME HIER DIGITAL CODING TEST</h2>
                    <br>
                </div>
            </div>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js?v=2.1.0') }}" type="text/javascript"></script>
</body>

</html>
