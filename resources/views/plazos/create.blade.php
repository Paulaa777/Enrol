@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido panel Cambiar Estado Plazos-->

    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Cambiar Estado Plazos')}}</</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('plazos.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container my-5 w-75 rounded-4 border form-background">
            
            
                <div class="container mt-3 mx-auto">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('plazos.store') }}" enctype="multipart/form-data">
                        @csrf


                            <div class="row">


                                <!-- Tipo Plazo -->
                                <span class="my-2 mb-3">{{ __('Cambiar Estado Plazo')}}</span>
                             
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2"> 
                                    <div class="form-group mb-3">  

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo_plazo" id="Preinscripción" value="Preinscripción" aria-label="Tipo Plazo Preinscripción" @if(old('tipo_plazo')) checked @endif>
                                            <label class="form-check-label" for="Preinscripción">
                                                {{ __('Preinscripción') }}
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo_plazo" id="Inscripción" value="Inscripción" aria-label="Tipo Plazo Inscripción" @if(old('tipo_plazo')) checked @endif>
                                            <label class="form-check-label" for="Inscripción">
                                                {{ __('Inscripción') }}
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo_plazo" id="Plazas Libres" value="Plazas Libres" aria-label="Tipo Plazo Plazas Libres" @if(old('tipo_plazo')) checked @endif>
                                            <label class="form-check-label" for="Plazas Libres">
                                                {{ __('Plazas Libres') }}
                                            </label>
                                        </div>
                                        
                                        @error('tipo_plazo')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                </div> 
                                                        
                           
                                <!-- Estado -->
                                <span class="my-2 mb-3">{{ __('Estado')}}</span>
                             
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">  
                                        <div class="d-inline-block me-1">{{__('Cerrado')}}</div>
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="hidden" name="estado" id="0" value="0"  @if (!old('estado')) @checked(false) @endif>
                                                <input class="form-check-input" type="checkbox" name="estado" id="1" value="1"  @if (old('estado')) @checked(true) @endif>
                                                <label class="form-check-label" for="estado">{{ __('Abierto') }}</label>                              
                                            </div>   
                                        </div>
                                                           
                                        @error('estado')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                                            
                                
                                <div class="mx-auto text-center my-3">
                                    <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Cambiar Estado Plazo')}}</button>
                                </div>
                            </div>

                      
                    </form>
                </div>

            </div>

        </div>

    </div>   
    <!-- fin col contenido panel CAmbiar Estado Plazos-->


@endsection