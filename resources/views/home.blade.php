@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Session::has('success'))
        <div data-notify="container" class="col-11 col-sm-4 alert alert-success alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out; z-index: 1031; top: 20px; right: 20px;">
            <button type="button" aria-hidden="true" aria-label="Close" class="close" data-dismiss="alert"  style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1033;"><i class="nc-icon nc-simple-remove"></i>
            </button>
            <span data-notify="icon" class="nc-icon nc-app"></span>
            <span data-notify="title"></span>
            <span data-notify="message">{{ Session::get('success') }}</span>
            <a href="#" target="_blank" data-notify="url"></a>
        </div>
        @endif
        @if(Session::has('warning'))
                <div data-notify="container" class="col-11 col-sm-4 alert alert-warning alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out; z-index: 1031; top: 20px; right: 20px;"><button type="button" aria-hidden="true" aria-label="Close" class="close" data-dismiss="alert" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1033;"><i class="nc-icon nc-simple-remove"></i></button><span data-notify="icon" class="nc-icon nc-app"></span> <span data-notify="title"></span> <span data-notify="message">{{ Session::get('warning') }}</span><a href="#" target="_blank" data-notify="url"></a></div>
        @endif
        @if(Session::has('error'))
            <div data-notify="container" class="col-11 col-sm-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out; z-index: 1031; top: 20px; right: 20px;"><button type="button" aria-hidden="true" aria-label="Close" class="close" data-dismiss="alert" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1033;"><i class="nc-icon nc-simple-remove"></i></button><span data-notify="icon" class="nc-icon nc-app"></span> <span data-notify="title"></span> <span data-notify="message">{{ Session::get('error') }}</span><a href="#" target="_blank" data-notify="url"></a></div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
