@extends('layouts.app_layout')

@section('contenido')
 
<div class="container-fluid py-3 mx-0 px-0">


        <div class="container-fluid">

            <div class="container w-auto">                    
             
                <div class="row"> 

                    <div class="col-xl-6 col-sm-6 py-1">

                        <div class="mt-5 pt-5 text-center">
                            <h3 class="display-6 mt-5 pt-5">{{__('Plataforma de Gestión de Actividades')}}</h3>
                        </div>
                    
                    </div>
                    
                    <div class="col-xl-6 col-sm-6 py-1">
                                         
                        <img class="img-fluid" src="{{ asset('/img/road.png')}}"  alt="imagen">
                            
                    </div>   
                </div>  
            </div>

        </div>

          
          
           
             
        <div class="container-fluid my-5 py-5 bg-inicio">
            <div class="container my-5 mx-auto">
                <div class="row d-flex justify-content-around">
                    
                    <div class="col text-center mx-auto">

                        <div class="my-2">                       
                            <h3 class="text-center py-5">{{__(' Descruba las Actividades Disponibles')}}</h3>
                        </div>

                        <div class="my-2 mx-auto">
                            <div class="mx-auto">
                                  <a href="{{ route('actividads.open.showActividadesAll.show') }}" class="btn btn-outline-dark nav-link p-2 border border-light border-opacity-75 shadow"> 
                                    <i class="fa-regular fa-chess-rook me-2"></i>
                                    <i class="fa-solid fa-tents me-2"></i>
                                    <span class="d-none d-sm-inline">{{ __('Actividades Disponibles')}}</span>
                                  </a>
                            </div>
                        </div>  

                    </div>
                
                    <div class="col text-center mx-auto"></div>

                    <div class="col text-center mx-auto">

                        <div class="my-2">                       
                            <h3 class="text-center py-5">{{__('Explore los Horarios de las Actividades')}}</h3>
                        </div>

                            <div class="col-lg-auto my-2">
                                <div class="mx-auto">
                                      <a href="{{ route('actividads.open.showHorariosAll.show') }}" class="btn btn-outline-dark nav-link p-2 border border-light border-opacity-75 shadow"> 
                                        <i class="fa-solid fa-clock me-2"></i>
                                        <i class="fa-regular fa-calendar-check me-2"></i>
                                        <span class="d-none d-sm-inline">{{ __('Horarios')}}</span>
                                      </a>
                                </div>
                            </div>  
                        </div>

                </div>
            </div>
        </div>
            
        
        <div class="container-fluid my-5 pb-3">
            <div class="container my-5 mx-auto">
                <div class="row justify-content-around">
                   
                    @foreach($openPlazos as $plazo)
                        @if($plazo->tipo_plazo=='Preinscripción')
                            <div class="col-lg-auto text-center">

                                <div class="my-2">                       
                                    <h3 class="text-center py-5">{{__('Preinscripciones')}}</h3>
                                </div>
                               
                                
                                <div class="m-2 mw-25">
                                    <div class="mx-auto">
                                        <a href="{{ route('preinscripcions.create') }}"class="btn btn-outline-dark nav-link p-2 border border-danger border-opacity-25 shadow"> 
                                            <i class="fa-solid fa-file-pen me-2"></i>
                                            <span class="d-none d-sm-inline">{{ __('Preinscríbase')}}</span>
                                        </a>
                                    </div>
                                </div>  

                            </div>
                        @endif

                        @if($plazo->tipo_plazo=='Inscripción')
                        <div class="col-lg-auto text-center">

                            <div class="my-2">                       
                                <h3 class="text-center py-5">{{__('Inscripciones')}}</h3>
                            </div>
                           
                            <div class="my-2">
                                <div class="mx-auto">
                                     <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border-danger border-opacity-25 shadow"> 
                                            <i class="fa-solid fa-file-pen me-2"></i>
                                            <span class="d-none d-sm-inline">{{ __('Inscríbase')}}</span>
                                    </a>
                                </div>
                            </div>  
                        </div>
                        @endif

                  
                        @if($plazo->tipo_plazo=='Plazas Libres')
                        <div class="col-lg-auto text-center">

                            <div class="my-2">                       
                                <h3 class="text-center py-5">{{__('Actividades con Plazas Libres')}}</h3>
                            </div>
                            
                            
                            <div class="my-2 mw-25">
                                <div class="mx-auto">
                                    <a href="{{ route('actividads.open.showActividadesLibres.show') }}" class="btn btn-outline-dark nav-link p-2 border-danger border-opacity-25 shadow"> 
                                        <i class="fa-solid fa-list-ol me-2"></i>
                                        <span class="d-none d-sm-inline">{{ __('Actividades con Plazas')}}</span>
                                    </a>
                                </div>
                            </div> 

                        </div>
                        @endif

                    @endforeach                    

                </div>
            </div>
        </div>
       

        <div class="container-fluid ba-img-news opacity-50 py-3">
           <h3 class="text-center text-white display-6 text-bold">{{__('Noticias')}}</h3> 
        </div>

        <div class="container-fluid">
            <div class="container mx-auto my-5">

                @foreach($openPosts as $post)
                @if(($post->tipo!='Aviso')&&($post->tipo!='Plazas Libres'))
              {{--  @if($post->tipo!='Aviso') --}}

                <article class="py-2 mx-auto w-75">
                    <p class="my-0">{{ date('d-m-Y', strtotime($post->created_at)) }} </p>
                    <p class="my-0 fw-light">{{ $post->tipo }} </p>
                    <div class="pt-2">
                        <p class="fs-5 mb-0">{{$post->titulo}}</p>

                        @if($post->tipo=="Inscripción")
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showInscripcionPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @elseif($post->tipo=="Preinscripción")
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showPreinscripcionPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @elseif($post->tipo=="Plazas Libres")
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showPlazasLibresPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @else
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showOpenPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @endif
                    </div>
                </article>

                @endif
                @endforeach
                               
            </div>
        </div>
       
    
        <div class="container-fluid ba-img-warning opacity-50 py-3">
            <h3 class="text-center text-white display-6 text-bold">{{__('Avisos')}}</h3> 
         </div>

        <div class="container-fluid">           
            <div class="container my-5">
                @foreach($openPosts as $post)
                @if($post->tipo=='Aviso')

                <article class="py-2 mx-auto w-75">
                    <p class="my-0">{{ date('d-m-Y', strtotime($post->created_at)) }} </p>
                    <p class="my-0 fw-light">{{ $post->tipo }} </p>
                    <div class="pt-2">
                        <p class="fs-5 mb-0">{{$post->titulo}}</p>

                        @if($post->tipo=="Inscripción")
                        <a class="font-bold float-end me-5" href="{{ route('posts.open.showInscripcionPost.show', $post->id) }}">
                            {{__('Leer Más')}} 
                            <i class="fa-solid fa-book-open-reader ms-2"></i>
                            <i class="fa-solid fa-right-long ms-2"></i>                           
                        </a>
                        @elseif($post->tipo=="Preinscripción")
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showPreinscripcionPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @elseif($post->tipo=="Plazas Libres")
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showPlazasLibresPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @else
                            <a class="font-bold float-end me-5" href="{{ route('posts.open.showOpenPost.show', $post->id) }}">
                                {{__('Leer Más')}} 
                                <i class="fa-solid fa-book-open-reader ms-2"></i>
                                <i class="fa-solid fa-right-long ms-2"></i>                           
                            </a>
                        @endif
                    </div>
                </article>

                @endif
                @endforeach

            </div>  
        </div>
        
    
  
   
</div>

@endsection