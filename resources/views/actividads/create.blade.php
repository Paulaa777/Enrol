@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido panel Añadir Actividad-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Añadir Actividad')}}</</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('actividads.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
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

                    <form method="POST" action="{{ route('actividads.store') }}" enctype="multipart/form-data">
                        @csrf


                            <div class="row">


                                <!-- Tipo Actividad -->
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2"> 
                                    <div class="form-group mb-3">  

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="Cultural" value="Cultural" aria-label="Tipo Cultural" @if(old('tipo')) checked @endif>
                                            <label class="form-check-label" for="Cultural">
                                                {{ __('Cultural') }}
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="Tecnológica" value="Tecnológica" aria-label="Tipo Tecnologica" @if(old('tipo')) checked @endif>
                                            <label class="form-check-label" for="Tecnologica">
                                                {{ __('Tecnológica') }}
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="Deportiva" value="Deportiva" aria-label="Tipo Deportiva" @if(old('tipo')) checked @endif>
                                            <label class="form-check-label" for="Deportiva">
                                                {{ __('Deportiva') }}
                                            </label>
                                        </div>
                                        
                                        @error('tipo')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                </div> 

                                <!-- Nombre Actividad -->
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2"> 
                                    <div class="form-group mb-3">
                                        <label for="nombre_actividad"> {{ __('Nombre Actividad') }}</label>
                                        <input type="text"  placeholder="Nombre Actividad" id="nombre_actividad" name="nombre_actividad" class="form-control" value="{{ old('nombre_actividad')}}" aria-label="nombre_actividad" required>
                                        @error('nombre_actividad')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div> 
                                </div> 
                                
                           
                                <!-- Dias Semana -->
                                <span class="my-2">{{ __('Días Semana')}}</span>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">                                    
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="lunes">{{ __('Lunes') }}</label>                              
                                            <input class="form-check-input" type="hidden" name="lunes" id="0" value="0" @if (!old('lunes')) @checked(false) @endif>
                                            <input class="form-check-input" type="checkbox" name="lunes" id="1" value="1" @if (old('lunes')) @checked(true) @endif>
                                        </div>                          
                                        @error('lunes')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">                                    
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="martes">{{ __('Martes') }}</label> 
                                            <input class="form-check-input" type="hidden" name="martes" id="0" value="0" @if (!old('martes')) @checked(false) @endif>                              
                                            <input class="form-check-input" type="checkbox" name="martes" id="1" value="1" @if (old('martes')) @checked(true) @endif>                                                                  
                                        </div>                  
                                        @error('martes')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">                                    
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="miercoles">{{ __('Miércoles') }}</label>                                                              
                                            <input class="form-check-input" type="hidden" name="miercoles" id="0" value="0"  @if (!old('miercoles')) @checked(false) @endif>                            
                                            <input class="form-check-input" type="checkbox" name="miercoles" id="1" value="1" @if (old('miercoles')) @checked(true) @endif>
                                        </div>                  
                                        @error('miercoles')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">                                    
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="jueves">{{ __('Jueves') }}</label>                              
                                            <input class="form-check-input" type="hidden" name="jueves" id="0" value="0" @if (!old('jueves')) @checked(false) @endif>                                                                  
                                            <input class="form-check-input" type="checkbox" name="jueves" id="1" value="1" @if (old('jueves')) @checked(true) @endif>                                                                  
                                        </div>                  
                                        @error('jueves')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">                                    
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="viernes">{{ __('Viernes') }}</label>                                                             
                                            <input class="form-check-input" type="hidden" name="viernes" id="0" value="0" @if (!old('viernes')) @checked(false) @endif>                           
                                            <input class="form-check-input" type="checkbox" name="viernes" id="1" value="1" @if (old('viernes'))  @checked(true) @endif>
                                        </div>                  
                                        @error('viernes')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                           
                                <!-- Categoria -->
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                    <div class="form-group mb-3">
                                        <label for="categoria">{{ __('Categoría') }} </label>
                                        <select class="form-select" name="categoria" id="categoria" value="{{ old('categoria') }}" aria-label="categoria" required>
                                            <option value="" select disabled> {{ __('Seleccionar Categoría') }} </option>
                                            <option value="Infantil"> {{ __('Infantil') }} </option>
                                            <option value="Junior"> {{ __('Junior') }}</option>
                                            <option value="Adolescente"> {{ __('Adolescente') }}</option>
                                            <option value="Adulto"> {{ __('Adulto') }} </option>
                                            <option value="Senior"> {{ __('Senior') }} </option>
                                        </select>
                                        @error('categoria')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hora Inicio -->
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                    <div class="form-group mb-3">
                                        <label for="hora_inicio">{{ __('Hora Inicio') }} </label>
                                        <select class="form-select" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio')}}" aria-label="hora_inicio" required>
                                            <option value="" select disabled> {{ __('Hora Inicio') }} </option>
                                            <option value="17:00">{{ __('17:00') }}</option>
                                            <option value="18:00">{{ __('18:00') }}</option>
                                            <option value="19:00">{{ __('19:00') }}</option>
                                            <option value="20:00">{{ __('20:00') }}</option>
                                            <option value="21:00">{{ __('21:00') }}</option>
                                        </select>
                                        @error('hora_inicio')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hor Fin -->
                                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                    <div class="form-group mb-3">
                                        <label for="hora_fin">{{ __('Hora Fin') }} </label>
                                        <select class="form-select" name="hora_fin" id="hora_fin" value="{{ old('hora_fin')}}" aria-label="hora_fin" required>
                                            <option value="" select disabled> {{ __('Hora Fin') }} </option>
                                            <option value="18:00">{{ __('18:00') }}</option>
                                            <option value="19:00">{{ __('19:00') }}</option>
                                            <option value="20:00">{{ __('20:00') }}</option>
                                            <option value="21:00">{{ __('21:00') }}</option>
                                            <option value="22:00">{{ __('22:00') }}</option>
                                        </select>
                                        @error('hora_fin')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mx-auto text-center my-3">
                                    <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Añadir')}}</button>
                                </div>
                            </div>

                      
                    </form>
                </div>

            </div>

        </div>

    </div>   
    <!-- fin col contenido panel Añadir Actividad-->


@endsection