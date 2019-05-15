@extends('layouts.master')

@section('title')
Mutasi
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">

            <!-- /.panel-heading -->
            <div class="card data-tables">
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <table id="deeptalk-table" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mutasi as $mutasi)
                            <tr>
                                <td>{{$mutasi->user_name}}</td>
                                <td>{{$mutasi->transaction_type}}<br>
                                    {{$mutasi->account_no}}
                                </td>
                                <td>IDR {{number_format($mutasi->amount,0,',','.')}}
                                </td>
                                <td>{{ date("j F Y",strtotime($mutasi->created_at))}}
                                </td>
                            </tr>
                            @endforeach
                            <tr class="success">
                                <td></td>
                                <td></td>
                                <td ><b>Grand Total</b></td>
                                <td ><b>IDR {{number_format($total,0,',','.')}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
            <!-- /.panel-body -->

        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop
@section('extrajavascript')

@stop
