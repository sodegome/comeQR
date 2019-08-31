@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crear</div>
                <div class="card-body">
                <form method="POST" action="{{ url('casas') }}">
                @csrf
                <div class="form-group row">
                            <label for="manzana" class="col-md-4 col-form-label text-md-right">{{ __('Manzana') }}</label>

                            <div class="col-md-6">
                                <input id="manzana" type="text" class="form-control @error('manzana') is-invalid @enderror" name="manzana" value="{{ old('manzana') }}" required autofocus>

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
                                <input id="villa" type="text" class="form-control @error('villa') is-invalid @enderror" name="villa" value="{{ old('villa') }}" required  autofocus>

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
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required  autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
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