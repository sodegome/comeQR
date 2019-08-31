@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                <h5>Lista de casas</h5>
                </div>

                <div class="card-body">
                <div class = 'pull-rigth'>
                    <div class='btn-group float-right mb-1'>
                        <a href="{{url('casas/create')}}" class='btn btn-primary'>Crear Casa</a>
                    </div>
                </div>
                    <div class='table-container'>
                        <table id='vcasatable' class='table table-bordred table-striped'>
                            <thead>
                                <th>Id</th>
                                <th>Manzana</th>
                                <th>Villa</th>
                                <th>Telefono</th>
                                <th>Creada</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @if($casas->count())    
                                @foreach($casas as $casa)  
                                <tr>
                                <td>{{$casa->id}}</td>
                                <td>{{$casa->manzana}}</td>
                                <td>{{$casa->villa}}</td>
                                <td>{{$casa->telefono}}</td>
                                <td>{{$casa->created_at}}</td>
                                <td><a href="{{url('casas/edit/'. $casa->id)}}" class = 'btn btn-secondary'>editar</a></td>
                                <td>
                                <form onsubmit='return confirm("Los usuarios seran eliminados junto con esta casa");' action="{{url('casas/'. $casa->id )}}" method="post">
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
                    
                    {{$casas->links()}}
                </div>
            </div>
        </div>
    </div>
<div>



@endsection