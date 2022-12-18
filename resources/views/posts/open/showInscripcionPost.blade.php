@extends('layouts.app_layout')

@section('contenido')

    <!-- fin col contenido show Post-->
    <div class="my-3 mt-5 py-2 mx-5 rounded-4 border shadow">

        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Detalle ')}} {{ $post->tipo }}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            
            <div class="row my-3 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ url('/') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <i class="fa-solid fa-house mx-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                           
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container my-5 w-auto">

                <div class="container w-auto">
                
                    <div class="text-center py-2">
                        <h4  class="mb-2">{{ $post->titulo }}</h4>
                    </div>
                        
                    
                    <div class="my-2">
                        <p>{{ date('d-m-Y h:i:s', strtotime($post->created_at)) }} </p> 
                    </div>
                       
                    <div class="my-2">
                     
                             <div class="mx-auto py-2">{{ $post->comentario }}</div>
                           
                    </div>

                </div>

                <div class="row my-3 d-flex justify-content-around">

                    <div class="col-lg-auto my-2">
                        <div class="mx-auto">
                              <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                                <i class="fa-solid fa-file-pen me-2"></i>
                                <span class="d-none d-sm-inline">{{ __('Inscribirse')}}</span>
                              </a>
                        </div>
                    </div>  
                   
                </div>

            </div>
         
        </div>
        
           

    </div>   
    <!-- fin col contenido show post -->

@endsection