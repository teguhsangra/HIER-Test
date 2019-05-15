@extends('layouts.master')

@section('title')
Topup Form
@stop
@section('content')
<div class="container">
        <div class="row">
        	<div class="col-md-12">
                    <!-- /.panel-heading -->
                    {{ Form::open(array('url' => 'top_up', 'method' => 'POST', 'id' => 'thisForm', 'enctype' => 'multipart/form-data')) }}

                    <div class="card">
                        <div class="card-body">
                            <input name="bank_id" type="hidden" class="form-control" value="{{ $bank->id }}" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}" >
                                        <label class="category">Amount</Label>
                                        <input name="amount" type="number" class="form-control" value="{{ old('amount') }}" >
                                        <small class="text-danger">{{ $errors->first('amount') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-footer">
                            <button type="button" id="form_submit" class="btn btn-danger btn-wd btn-next pull-right">Save</button>
                        </div>
                    </div>
                    {{ Form::close() }}
        	</div>
        </div>
</div>
@stop
