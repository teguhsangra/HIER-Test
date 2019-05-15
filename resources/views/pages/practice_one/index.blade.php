@extends('layouts.master')

@section('title')
Practice One
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
                                <label class="category">Text</Label>
                                <input name="title" type="text" class="form-control" id="character">
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
                    <button type="button" id="check" onclick="check()" class="btn btn-danger btn-wd btn-next pull-right">Check</button>
                </div>
            </div>
       </div>
   </div>
</div>
@endsection

@section('extrajavascript')
<script>
function check(){
    var character = document.getElementById('character').value;
    document.getElementById('results').value = firstRepeatingLetter(character);
}

function firstRepeatingLetter(str){
    for (var i = 0; i < str.length; i++){
        var count = 0;

        for (var j = 0; j < str.length; j++){

            if (str[i] === str[j]) {
                count++;

                if (count >= 2) {
                    return str[i];
                }
            }

        }
    }
}
</script>
@stop
