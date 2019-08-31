@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crear</div>
                <div class="card-body">
                <form method="POST" action="{{ url('residentes/'.$residente->id) }}">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $residente->username }}" required autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>

                 <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $residente->name}}" required  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>

                 <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $residente->last_name }}" required  autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $residente->email }}" required  autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                <div class="form-group row">
                            <label for="casa_id" class="col-md-4 col-form-label text-md-right">{{ __('casa_id') }}</label>

                            <div class="col-md-6">
                                <input id="casa_id" type="Number" class="form-control @error('casa_id') is-invalid @enderror" name="casa_id" value="{{ $residente->casa_id }}" required  autofocus>

                                @error('casa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <div class="form-group row">
                            <label for="identification" class="col-md-4 col-form-label text-md-right">{{ __('identification') }}</label>

                            <div class="col-md-6">
                                <input id="identification" type="text" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ $residente->identification }}" required  autofocus>

                                @error('identification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                <div class="form-group row">
                            <label for="type_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Id') }}</label>

                            <div class="col-md-6">
                                <select id="type_id" class="form-control" name="type_id" value="{{ $residente->type_id }}" required  autofocus>
                                    <option value="CED" @php if($residente->type_id=='CED')echo 'selected'@endphp>Cedula</option>
                                    <option value="PAS" @php if($residente->type_id=='PAS')echo 'selected'@endphp>Pasaporte</option>
                                    <option value="RUC" @php if($residente->type_id=='RUC')echo 'selected'@endphp>R.U.C</option>
                                </select>

                                @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 <div class="form-group row">
                            <label for="cell" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" class="form-control @error('cell') is-invalid @enderror" name="cell" value="{{ $residente->cell }}" required  autofocus>

                                @error('cell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>

                 <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado Id') }}</label>

                            <div class="col-md-6">
                                <select id="state" class="form-control" name="state" value="{{ $residente->state }}" required  autofocus>
                                    <option value="A" @php if($residente->state=='A')echo 'selected'@endphp>Activo</option>
                                    <option value="I" @php if($residente->state=='I')echo 'selected' @endphp>Inactivo</option>
                                    <option value="N" @php if($residente->state=='N')echo 'selected'@endphp>Anulado</option>
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                 


                 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{url('residentes')}}" class = 'btn btn-primary'>{{ __('Atras') }}</a>
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