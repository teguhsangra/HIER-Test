<!doctype html>
<html lang="{{ config('app.locale') }}">

    <head>
        @include('partials.header')
         <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        @yield('extracss')
    </head>

    <body>
        <div class="wrapper wrapper-full-page">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
                <div class="container">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">HIER</a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item  active ">
                                <a href="/login" class="nav-link">
                                    <i class="nc-icon nc-mobile"></i> Login
                                </a>
                            </li>
                            <li class="nav-item  active ">
                                <a href="/register" class="nav-link">
                                    <i class="nc-icon nc-dekstop"></i> Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        @yield('content')
        <footer class="footer">
            <div class="container">

            </div>
        </footer>
        </div>

        @include('partials.javascript')
    </body>

</html>
