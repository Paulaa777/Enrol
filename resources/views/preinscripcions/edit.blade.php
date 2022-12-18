@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar Preinscripcion-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Preinscripción')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('preinscripcions.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{('Volver')}}</span>
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
                    

                    <form method="POST" action="{{ route('preinscripcions.update', $preinscripcion->id) }}" >
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <!-- Código Usuario -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <input type="hidden" id="cod_usuario" name="cod_usuario" class="form-control" value="{{ $cod_usuario=Auth::user()->id }}">
                                </div>
                            </div>


                            <!-- Código Participante-->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="cod_participante"> {{ __('Participante') }}</label>
                                    <select class="form-select" id="cod_participante" name="cod_participante" class="form-control" value="{{ $preinscripcion->cod_participante }}" aria-label="cod_participante" selected disabled>
                                        <option value="{{ $cod_participante->id }}">{{ __($cod_participante->nombre_participante) }} {{ __($cod_participante->apellidos_participante) }}</option>
                                    </select>
                                </div>
                            </div>
                            

                            <!-- Actividad -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="cod_actividad"> {{ __('Actividad') }}</label>
                                    <select class="form-select" id="cod_actividad" name="cod_actividad" class="form-control" value="{{ $preinscripcion->cod_actividad }}" aria-label="cod_actividad" selected disabled>
                                       <option value="{{ $cod_actividad->id }}">{{ __($cod_actividad->nombre_actividad) }} {{ __($cod_actividad->categoria) }}</option>
                                   </select>
                                </div>
                            </div>

                            <!--Plaza Obtendia-->                                 
                            <span class="my-3">{{__('Plaza Obtenida')}}</span>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group mb-3">  
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="plaza_obtenida">{{ __('Si') }}</label>                              
                                        <input class="form-check-input" type="checkbox" name="plaza_obtenida" id="NO" value="NO" @if (!$preinscripcion->plaza_obtenida) @checked(false) @endif>
                                        <input class="form-check-input" type="checkbox" name="plaza_obtenida" id="SI" value="SI" @if ($preinscripcion->plaza_obtenida) @checked(true) @endif>
                                    </div>                          
                                    @error('plaza_obtenida')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
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

    <!-- fin col contenido panel Editar preinscripcion-->


@endsection