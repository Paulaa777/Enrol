@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido show Post-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Detalle Post')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('posts.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="container my-5 w-auto">

                <div class="table-responsive w-auto">
                
                    <table class="table align-middle">
                        <tbody>
                            <tr>
                                <th class="fs-5">{{ __('Tipo') }}</th>
                                <td class="fw-bold fs-5 text-uppercase">{{ $post->tipo }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Título') }}</th>
                                <td>{{ $post->titulo }}</td>
                            </tr>
                            @foreach($autor as $a)
                            <tr>
                                <th>{{ __('Autor') }}</th>
                                <td>{{__('ID:')}} {{ $post->autor }}{{_(' -> ') }}{{$a->nombre}} {{$a->apellidos}} </td>                            
                            </tr>
                            @endforeach
                            <tr>
                                <th>{{ __('Fecha Creación') }}</th>
                                <td> {{ date('d-m-Y h:i:s', strtotime($post->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Archivado') }}</th>
                                <td>@if ($post->archivado==1) {{__('SI')}} @else {{_('NO')}} @endif</td>
                            </tr>
                            <tr>                      
                                <th>{{ __('Fecha Actualización') }}</th>
                                <td>{{ date('d-m-Y h:i:s', strtotime($post->updated_at)) }}</td>                           
                            </tr>
                            <tr>
                                <th>{{ __('comentario') }}</th>
                                <td>{{ $post->comentario }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Acción') }}</th>
                                <td  class="py-3">
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="Post" class="delete">
                                       
                                        <a href="{{ route('posts.index') }}"><i class="fa-solid fa-rectangle-list me-3 fs-5"></i></a>
                                        
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
                        
                        </tbody>
                    </table>

                </div>

            </div>
         
        </div>
        
           

    </div>   
    <!-- fin col contenido show post -->

@endsection