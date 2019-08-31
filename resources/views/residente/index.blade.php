@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
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
                <h5>Lista de residentes</h5>
                </div>

                <div class="card-body">
                <div class = 'pull-rigth'>
                    <div class='btn-group float-right mb-1'>
                        <a href="{{url('residentes/create')}}" class='btn btn-primary'>Crear residente</a>
                    </div>
                </div>
                    <div class='table-container'>
                        <table id='vresidentetable' class='table table-bordred table-striped'>
                            <thead>
                            <th>Id</th>
                            <th>usuario</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>email</th>
                            <th>casa</th>
                            <th>identificacion</th>
                            <th>tipo</th>
                            <th>cell</th>
                            <th>estado</th>
                            <th>Creado</th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                                @if($residentes->count())    
                                @foreach($residentes as $residente)  
                                <tr>
                                <td>{{$residente->id}}</td>
                                <td>{{$residente->user}}</td>
                                <td>{{$residente->name}}</td>
                                <td>{{$residente->last_name}}</td>
                                <td>{{$residente->email}}</td>
                                <td>{{$residente->casa_id}}</td>
                                <td>{{$residente->identification}}</td>
                                <td>{{$residente->type_id}}</td>
                                <td>{{$residente->cell}}</td>
                                <td>{{$residente->state}}</td>
                                <td>{{$residente->created_at}}</td>
                                <td><a href="{{url('residentes/edit/'. $residente->id)}}" class = 'btn btn-secondary'>editar</a></td>
                                <td>
                                <form onsubmit='return confirm("Los usuarios seran eliminados junto con sus invitados");' action="{{url('residentes/'. $residente->id )}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xsn " type="submit">eliminar</button>
                                </form>
                                </td>
                                </tr>
                                @endforeach 
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    {{$residentes->links()}}
                </div>
            </div>
        </div>
    </div>
<div>


@endsection