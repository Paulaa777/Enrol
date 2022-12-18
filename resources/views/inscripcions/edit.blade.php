@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar Inscripcion-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Inscripción')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('inscripcions.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @elseif(session('alert'))
            <div class="alert alert-danger mb-1 mt-1">
                {{ session('alert') }}
            </div>
            @endif
          
            <div class="container-fluid d-flex justify-content-center my-5 w-auto">
            
            
                <div class="container-fluid mt-3 rounded-4 border form-background mx-auto w-auto">
                    
                   

                    <form method="POST" action="{{ route('inscripcions.update', $inscripcion->id) }}" >
                        @method('PUT')
                        @csrf

                        <div class="container p-4">

                            <!-- Código Usuario -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <input type="hidden" id="c_usuario" name="c_usuario" class="form-control" value="{{ $cod_user=Auth::user()->id }}">
                                </div>
                            </div>


                            <!-- Código Participante-->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="c_participante"> {{ __('Participante') }}</label>
                                    <select class="form-select" id="c_participante" name="c_participante" class="form-control" value="{{ $inscripcion->c_participante }}" aria-label="c_participante" selected disabled>
                                       <option value="{{ $c_participante->id }}">{{ __($c_participante->nombre_participante) }} {{ __($c_participante->apellidos_participante) }}</option>
                                    </select>                                  
                                </div>
                            </div>
                            

                             <!-- Actividad -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="c_actividad"> {{ __('Actividad') }}</label>
                                    <select class="form-select" id="c_actividad" name="c_actividad" class="form-control" value="{{ $inscripcion->c_actividad }}" aria-label="c_actividad" selected disabled>
                                       <option value="{{ $c_actividad->id }}">{{ __($c_actividad->nombre_actividad) }} {{ __($c_actividad->categoria) }}</option>
                                    </select>
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

    <!-- fin col contenido panel Editar Inscripcion-->


@endsection