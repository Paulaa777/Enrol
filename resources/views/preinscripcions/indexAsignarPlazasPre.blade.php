@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido index Asignar Plazas -->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Asignar Plazas')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('preinscripcions.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver Index Preinscripciones')}}</span>
                          </a>
                    </div>
                </div>  

            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="container justify-content-center my-5 mx-auto">

                <div class="mx-auto d-flex justify-content-around my-5 py-5">

                    <!--Plazas Completas-->
                    <div class="col-lg-auto my-5">
                        <div class="mx-auto">
                            <a href="{{ route('preinscripcions.asignarPlazasPreinscripcion.edit') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow"> 
                              <i class="fa-regular fa-square-check me-2"></i>
                              <span class="d-none d-sm-inline">{{ __('Asignar Plazas Completas')}}</span>
                            </a>
                        </div>
                    </div>                      

                    <!--Plazas Superadas-->
                    <div class="col-lg-auto my-5">
                        <div class="mx-auto">
                            <a href="{{ route('preinscripcions.asignarPlazasPreSuperadas.edit') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow"> 
                              <i class="fa-regular fa-square-check me-2"></i>
                              <span class="d-none d-sm-inline">{{ __('Asignar Plazas Superadas')}}</span>
                            </a>
                        </div>
                    </div>  

                
                </div>
            </div>
         
        </div>
    
        

    </div>   
    <!-- fin col contenido index Asignar Plazas -->

@endsection