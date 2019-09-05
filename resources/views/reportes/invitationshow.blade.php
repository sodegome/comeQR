@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">
                <h5>Invitacion de {{$invitation->invitado->name}}</h5>
                </div>

                <div class="card-body">
                    <div class='table-container'>
                      <div id='qrcode'>
                    </div>
                    </div>
                </div>
            </div>
    </div>
<div>
@endsection
@section('scripts')
<script>

var qrcode = new QRCode("qrcode", {
    text: "{{$invitation->serial}}",
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

</script>
@endsection