@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar Participante-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Participante')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('participantes.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-3 mx-auto">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('participantes.update', $participante->id) }}" >
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <!-- Nombre_participante  -->

                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nombre_participante"> {{ __('Nombre Participante') }}</label>
                                    <input type="text" id="nombre_participante" name="nombre_participante" class="form-control" value="{{ $participante->nombre_participante }}" aria-label="nombre_participante" required>
                                    @error('nombre_participante')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <!-- Apellidos_participante -->
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="apellidos_participante"> {{ __('Apellidos Participante') }}</label>
                                    <input type="text" id="apellidos_participante" name="apellidos_participante" class="form-control" value="{{ $participante->apellidos_participante }}" aria-label="apellidos_participante" required>
                                    @error('apellidos_participante')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- DNI|DNIe|NIE -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="dni_participante"> {{ __('DNI|NIF|NIE') }}</label>
                                    <input type="text" id="dni_participante" name="dni_participante" class="form-control" value="{{ $participante->dni_participante }}" aria-label="dni_participante" required>
                                    @error('dni_participante')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                  

                             <!-- Fecha Nacimiento_participante -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nacimiento_participante"> {{ __('Fecha de Nacimiento') }}</label>
                                    <input type="date" id="nacimiento_participante" name="nacimiento_participante" class="form-control" value="{{ date('Y-m-d', strtotime($participante->nacimiento_participante)) }}" aria-label="nacimiento_participante" required>
                                    @error('nacimiento_participante')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Móvil -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="movil_participante"> {{ __('Móvil') }}</label>
                                    <input type="tel" id="movil_participante" name="movil_participante" class="form-control" value="{{ $participante->movil_participante }}" aria-label="movil_participante" required>
                                    @error('movil_participante')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Código Usuario -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <input type="hidden" id="cod_user" name="cod_user" class="form-control" value="{{ $cod_user=Auth::user()->id  }}">
                                </div>
                            </div>

                                                   
                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Editar')}}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   

    <!-- fin col contenido panel Editar Participante-->


@endsection