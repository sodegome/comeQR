@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Editar</div>
                <div class="card-body">
                <form method="POST" action="{{ url('casas/'. $casa->id) }}">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group row">
                            <label for="manzana" class="col-md-4 col-form-label text-md-right">{{ __('Manzana') }}</label>

                            <div class="col-md-6">
                                <input id="manzana" type="text" class="form-control @error('manzana') is-invalid @enderror" name="manzana" value="{{$casa->manzana}}" required autofocus>

                                @error('manzana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>

                 <div class="form-group row">
                            <label for="villa" class="col-md-4 col-form-label text-md-right">{{ __('Villa') }}</label>

                            <div class="col-md-6">
                                <input id="villa" type="text" class="form-control @error('villa') is-invalid @enderror" name="villa" value="{{$casa->villa}}" required  autofocus>

                                @error('villa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>

                 <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$casa->telefono}}" required  autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                 <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                                <a href="{{url('casas')}}" class = 'btn btn-primary'>{{ __('Atras') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                
                        </div>
                </div>
                </form>   
               
                </div>
            </div>
        </div>
    </div>
<div>









@endsection