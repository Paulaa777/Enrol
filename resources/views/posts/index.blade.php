@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido index Posts -->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Posts')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('dashboard') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <i class="fa-solid fa-house-user me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver Inicio')}}</span>
                          </a>
                    </div>
                </div>  

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                          <i class="fa-solid fa-plus me-2"></i>
                          <span class="d-none d-sm-inline">{{ __('Añadir Post')}}</span>
                        </a>
                    </div>
                </div>  
                
                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('posts.abrirPlazos.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-unlock-keyhole me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Post Abrir Plazos')}}</span>
                          </a>
                    </div>
                </div>  

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('posts.cerrarPlazos.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-lock me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Post Cerrar Plazos')}}</span>
                          </a>
                    </div>
                </div>
               
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="container d-flex justify-content-center my-5 mx-auto">

                <div class="table-responsive w-auto">

                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Fecha Creación') }}</th>
                                <th>{{ __('Tipo') }}</th>
                                <th>{{ __('ID Autor') }}</th>
                                <th>{{ __('Título') }}</th>
                                <th>{{ __('Archivado') }}</th>
                                <th>{{ __('Fecha Archivado') }}</th>
                               
                                <th>{{ __('Acción') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="text-center align-middle">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ date('d-m-Y h:i:s', strtotime($post->created_at)) }}</td>
                                    <td class="text-uppercase">{{ $post->tipo }}</td>
                                    <td>{{ $post->autor }}</td>
                                    <td class="text-start">{{ $post->titulo }}</td>
                                    <td>@if ($post->archivado==1) {{ __('SI')}} @else  {{ __('No')}} @endif </td>
                                    <td>@if ($post->archivado==1) {{ date('d-m-Y h:i:s', strtotime($post->updated_at)) }} @else {{_(' - ')}} @endif</td>
                                    <td class="text-center align-middle">
                                        
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="Post" class="delete">
                                           
                                            <a href="{{ route('posts.show',  $post->id) }}"><i class="fa-solid fa-eye mx-3 fs-5"></i></a>
                                           {{-- <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a> --}}
                                            
                                            @if($post->tipo=='Abrir Inscripción')
                                                <a href="{{ route('posts.abrir.editInscripcion.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>
                                           
                                            @elseif($post->tipo=='Abrir Preinscripción')
                                                 <a href="{{ route('posts.abrir.editPreinscripcion.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>                                           
                                            
                                            @elseif($post->tipo=='Abrir Plazas Libres')
                                                <a href="{{ route('posts.abrir.editPlazasLibres.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>                                           
                                            
                                            @elseif($post->tipo=='Cerrar Inscripción')
                                                <a href="{{ route('posts.cerrar.editCerrarInscripcion.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>
                                           
                                            @elseif($post->tipo=='Cerrar Preinscripción')
                                                 <a href="{{ route('posts.cerrar.editCerrarPreinscripcion.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>                                           
                                            
                                            @elseif($post->tipo=='Cerrar Plazas Libres')
                                                <a href="{{ route('posts.cerrar.editCerrarPlazasLibres.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>                                           
                                            
                                            @else
                                                <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>                                            
                                            
                                            @endif

                                            @csrf
                                            @method('DELETE')
                                            
                                            <button class="btn m-0 p-0" type="submit" id="btn-delete"> 
                                                <a><i class="fa-solid fa-trash-can mx-3 fs-5"></i></a>                             
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
         
        </div>
    
        

    </div>   
    <!-- fin col contenido index Posts -->

@endsection