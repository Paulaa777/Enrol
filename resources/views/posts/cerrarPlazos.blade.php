@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido Cerrar Plazos -->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Publicar Cierre Plazos')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('home') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Inicio')}}</span>
                          </a>
                    </div>
                </div>  

            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


 
            <div class="container d-flex justify-content-around my-5 py-5 mx-auto">

                
                <!--Cerrar Preinscripciones-->
                <div class="col-lg-auto my-5">
                    <div class="mx-auto">
                        <a href="{{ route('posts.cerrar.createCerrarPreinscripcion.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow"> 
                            <i class="fa-solid fa-plus me-2"></i>
                            <i class="fa-regular fa-file-lines me-2"></i>
                            <i class="fa-solid fa-lock me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Post Cerrar Preinscripción')}}</span>
                        </a>
                    </div>
                </div>                      

                <!--Cerrar Inscripciones-->
                <div class="col-lg-auto my-5">
                    <div class="mx-auto">
                        <a href="{{ route('posts.cerrar.createCerrarInscripcion.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow"> 
                            <i class="fa-solid fa-plus me-2"></i>
                            <i class="fa-regular fa-file-lines me-2"></i>
                            <i class="fa-solid fa-lock me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Post Cerrar Incripción')}}</span>
                        </a>
                    </div>
                </div>  

                 <!--Abrir Plazas Libres-->
                 <div class="col-lg-auto my-5">
                    <div class="mx-auto">
                        <a href="{{ route('posts.cerrar.createCerrarPlazasLibres.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow"> 
                            <i class="fa-solid fa-plus me-2"></i>
                            <i class="fa-regular fa-file-lines me-2"></i>
                            <i class="fa-solid fa-unlock me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Post Cerrar Plazas Libres')}}</span>
                        </a>
                    </div>
                </div> 
           

        </div>
         
        </div>
    
        

    </div>   
    <!-- fin col contenido Cerrar Plazos -->

@endsection