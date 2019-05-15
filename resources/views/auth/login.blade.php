@extends('layouts.app')

@section('content')
<div class="full-page  section-image" data-color="purple" data-image="{{ asset('/dashboard/img/full-screen-image-2.jpg') }}" ;="">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" role="form" method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}
                        <div class="card card-login ">
                            <div class="card-header ">
                                <h3 class="header text-center">Login</h3>
                            </div>
                            <div class="card-body ">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>Email address</label>
                                         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-warning btn-wd">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <div class="full-page-background" style="background-image: url({{ asset('/dashboard/img/full-screen-image-2.jpg') }}) ">
    </div>
</div>
@endsection
