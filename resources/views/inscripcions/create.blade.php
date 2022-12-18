@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido panel Añadir Inscripcion-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Añadir Inscripcion')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('inscripcions.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            
            @if($abierto)
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

                        <form method="POST" action="{{ route('inscripcions.store') }}" >
                            @csrf

                            <div class="row">

                                @if($plazaNoObtenida)                                                 

                                    
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
                                            <select class="form-select" id="c_participante" name="c_participante" class="form-control" value="{{ old('c_participante') }}" aria-label="c_participante" required>
                                                @foreach ($c_participante as $participante)
                                                    <option value="{{ $participante->id }}" @selected(old('c_participante' == $participante->id))>{{ __($participante->nombre_participante) }} {{ __($participante->apellidos_participante) }}</option>
                                                @endforeach
                                            </select>
                                            @error('c_participante')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                

                                     <!-- Actividad -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                        <div class="form-group mb-3">
                                            <label for="c_actividad"> {{ __('Actividad') }}</label>
                                            <select class="form-select" id="c_actividad" name="c_actividad" class="form-control" value="{{ old('c_actividad') }}" aria-label="c_actividad" required>
                                                @forelse ($c_actividad as $actividad)
                                                    
                                                <option value="{{ $actividad->id }}" @selected(old('c_actividad' == $actividad->id))>{{ __($actividad->nombre_actividad) }} {{ __($actividad->categoria) }}</option>
                                                
                                                @empty
                                                
                                                <option selected value="">{{ __('NO QUEDAN ACTIVIDADES CON PLAZAS LIBRES') }}<option>
                                                                                            
                                                @endforelse
                                                
                                            </select>
                                            @error('c_actividad')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                      <!-- Precio--> 
                                    {{-- 
                                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                        <div class="form-group mb-3">
                                            <label for="precio"> {{ __('Precio') }}</label>
                                            <input type="text"  placeholder="precio" id="precio" name="precio" class="form-control" value="{{ old('precio')}}" aria-label="precio" required>
                                            @error('precio')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    --}}

                                @else

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
                                                                
                                            <select class="form-select" id="c_participante" name="c_participante" class="form-control" value="{{ old('c_participante') }}" aria-label="c_participante" selected>
                                              
                                                @foreach($preinscripciones as $pre)    
                                                                       
                                                    <option value="{{ $pre->cod_participante }}" @selected(old('c_participante' == $pre->cod_participante))> {{ __($pre->nombre_participante) }} {{ __($pre->apellidos_participante) }} </option>

                                               @endforeach                                                
                                            </select>    

                                        </div>
                                    </div>
                            
                                    <!-- Actividad -->
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                        <div class="form-group mb-3">
                                            <label for="c_actividad"> {{ __('Actividad') }}</label>
                                           <select class="form-select" id="c_actividad" name="c_actividad" class="form-control" value="{{ old('c_actividad') }}" aria-label="c_actividad" selected>
                                            @foreach($preinscripciones as $pre)
                                                <option value="{{ $pre->cod_actividad}}" @selected(old('c_actividad' == $pre->id))>{{ __($pre->nombre_actividad) }} {{ __($pre->categoria) }}</option>
                                            @endforeach                                            
                                            </select> 
                                           
                                        </div>
                                    </div>                          
                                     
                               
 

                                @endif
                              
                                
                                
                                <div class="mx-auto text-center my-3">

                                    <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Inscribir')}}</button>
                                </div>
                            </div>                         

                        </form>
                    </div>

                </div>

            @else

            <div class="container d-flex justify-content-center my-5 mx-auto rounded-4 border form-background">
                
                
                <div class="container w-auto mt-3 mx-auto my-5">
                    
                    <h3 class="text-danger text-center my-5">{{__('Cerrado Plazo para Inscribirse')}}</h3>

                </div>
            
            </div>

            @endif

        </div>

    </div>   
    <!-- fin col contenido panel Añadir Inscripcion-->


@endsection