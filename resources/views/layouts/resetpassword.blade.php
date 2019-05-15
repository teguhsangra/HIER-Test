<!doctype html>
<html lang="{{ config('app.locale') }}">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @include('dashboard.partials.header')
        @yield('extracss')
    </head>

    <body>
        <div class="wrapper wrapper-full-page">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
                <div class="container">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">{{ __('Reset Password') }}</a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                            <span class="navbar-toggler-bar burger-lines"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="lock.html" class="nav-link">
                                    <i class="nc-icon nc-key-25"></i> Lock
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
                
            </nav>
            <!-- End Navbar -->
        @yield('content')
        <footer class="footer">
            <div class="container">
                <nav>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.kwikku.com">Kwikku.com</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
        </div>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @include('dashboard.partials.javascript')
    </body>

</html>