@extends('layouts.master')

@section('title')
Practice Two
@stop
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12">
               <!-- /.panel-heading -->

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label class="category">Number</Label>
                                <input name="title" type="text" class="form-control" id="character">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label class="category">Variable number</Label>
                                <textarea name="desc" class="form-control" id="variable_number" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label class="category">Result</Label>
                                <textarea name="desc" class="form-control" id="results" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-footer">
                        <button type="button" id="check" onclick="pushArray()" class="btn btn-danger btn-wd btn-next pull-left">Push number to array</button>
                    <button type="button" id="check" onclick="check()" class="btn btn-danger btn-wd btn-next pull-right">Check</button>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection

@section('extrajavascript')
<script>
var items = [];

function pushArray(){
    var character = document.getElementById('character').value;
    items.push(character);
    document.getElementById('variable_number').value = items;


}
function check(){

    document.getElementById('results').value = bubleSort(items);
}


function bubleSort(int){

    let len = int.length;
    let swapped;
    do {
        swapped = false;
        for (let i = 0; i < len; i++) {
            if (int[i] > int[i + 1]) {
                let tmp = int[i];
                int[i] = int[i + 1];
                int[i + 1] = tmp;
                swapped = true;
            }
        }
    } while (swapped);
    return int;


}
</script>
@stop
