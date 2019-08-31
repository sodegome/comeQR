@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class='mb-3'>
        <form class='form-inline'>
                <div class="input-group">  
                <select id="state" class="browser-default custom-select" name="state"  required  autofocus>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                </select>
                <input name="desde" class="form-control" id='from_date' type="date">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Hasta</span>
                </div>
                <input name="hasta" class="form-control" id='to_date' type="date">
                <div class="input-group-append">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Buscar</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-warning ">Todos</button>
                </div>
                </div>
        </form>
        </div>

        <div class="col-md-12">
            <div class="card">
            @if(Session::has('success'))
            <div class='alert alert-info alert-dismissible fade show' role='alert'>
                {{Session::get('success')}}
                <button type = 'button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                
                </button>
            </div>
            @endif
                
                <div class="card-header">
                <h5>Invitaciones</h5>
                </div>

                <div class="card-body">
                    <div class='table-container'>
                        <table id='vinvitable' class='table table-bordred table-striped'>
                            <thead>
                            <th>Id</th>
                            <th>Serial</th>
                            <th>invitado_id</th>
                            <th>placa vehiculo</th>
                            <th>fecha desde</th>
                            <th>fecha hasta</th>
                            <th>estado</th>
                            <th>Frecuencia</th>
                            <th>Fecha</th>
                            <th>Inactivar</th>
                            <th>Ver</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        @csrf
                    </div>
                </div>
            </div>
    </div>
<div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){

 var _token = $('input[name="_token"]').val();

 

 fetch_data();

 function nvl(data){
     if(data){
         return data;
     }
     return '-'

 }

 function fetch_data(from_date = '', to_date = '')
 {
  var select = $('#state').val();
  console.log(select);
  var rutainact = "{{ url('invitations/inactivar') }}";

  var rutaver = "{{ url('invitations/ver') }}"

  $.ajax({
   url:"{{ url('invitations') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date,select:select, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    //$('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + nvl(data[count].id) + '</td>';
     output += '<td>' + nvl(data[count].serial) + '</td>';
     output += '<td>' + nvl(data[count].invitado_id) + '</td>';
     output += '<td>' + nvl(data[count].placa_vehiculo) + '</td>';
     output += '<td>' + nvl(data[count].fecha_desde) + '</td>';
     output += '<td>' + nvl(data[count].fecha_hasta) + '</td>';
     output += '<td>' + nvl(data[count].state) + '</td>';
     output += '<td>' + nvl(data[count].frecuencia_id) + '</td>';
     output += '<td>' + nvl(data[count].updated_at) + '</td>';
    
     if(data[count].state == 'A'){
         var inactivar = "<td><a href=" + rutainact +"/" + data[count].id + " class = 'btn btn-secondary'>Inactivar</a></td>";
         output += inactivar;
     }else{
        output += '<td>-</td>';
     }

     var ver = "<td><a href=" + rutaver +"/" + data[count].id + " class = 'btn btn-secondary'>Ver</a></td></tr>";;
     output += ver;


    //Desactivar la invitacion



    }
    $('tbody').html(output);
   },
    error: function(jq,status,message) {
        alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
    }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();


  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});


</script>



@endsection