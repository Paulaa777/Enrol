@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar monitor-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Monitor')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('monitors.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-2">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif
                    

                    <form method="POST" action="{{ route('monitors.update', $monitor->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <!-- Nombre monitor -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nombre_monitor"> {{ __('Nombre') }}</label>
                                    <input type="text" id="nombre_monitor" name="nombre_monitor" class="form-control" value="{{ $monitor->nombre_monitor }}" aria-label="nombre_monitor" required>
                                    @error('nombre_monitor')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <!-- Apellidos monitor -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="apellidos_monitor"> {{ __('Apellidos') }}</label>
                                    <input type="text" id="apellidos_monitor" name="apellidos_monitor" class="form-control" value="{{ $monitor->apellidos_monitor }}" aria-label="apellidos_monitor" required>
                                    @error('apellidos_monitor')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- DNI monitor -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="dni_monitor"> {{ __('DNI|NIF|NIE') }}</label>
                                    <input type="text" id="dni_monitor" name="dni_monitor" class="form-control" value="{{ $monitor->dni_monitor }}" aria-label="dni_monitor" required>
                                    @error('dni_monitor')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            
                            <!-- Email monitor -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="email_monitor"> {{ __('Email') }}</label>
                                    <input type="email" id="email_monitor" name="email_monitor" class="form-control" value="{{ $monitor->email_monitor }}" aria-label="email_monitor" required>
                                    @error('email_monitor')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Móvil monitor -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="movil_monitor"> {{ __('Móvil') }}</label>
                                    <input type="tel" id="movil_monitor" name="movil_monitor" class="form-control" value="{{ $monitor->movil_monitor }}" aria-label="movil_monitor" required>
                                    @error('movil_monitor')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Actividad -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="cod_actividad"> {{ __('Actividad') }}</label>
                                    <select class="form-select" id="cod_actividad" name="cod_actividad" class="form-control" value="{{ $monitor->cod_actividad }}" aria-label="cod_actividad" required>
                                        @foreach ($cod_actividad as $cod)
                                            <option value="{{ $cod->id }}" @selected($monitor->cod_actividad == $cod->id)>{{ __($cod->nombre_actividad) }}</option>
                                        @endforeach
                                    </select>
                                    @error('cod_actividad')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Actualizar')}}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   

{{-- @dd($monitor) --}}
    <!-- fin col contenido panel Editar monitor-->


@endsection