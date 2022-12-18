@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar Post Preinscripción-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Posts Apertura Preinscripción')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver Index Posts')}}</span>
                        </a>
                    </div>
                </div> 
                
                <div class="col-lg-auto my-2">                   
                    <div class="mx-auto">
                          <a href="{{ route('posts.abrirPlazos.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver Abrir Plazos')}}</span>
                          </a>
                    </div>
                </div> 
                             
            </div>

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-2">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @endif
                    

                    <form method="POST" action="{{ route('posts.abrir.updatePreinscripcion.update', $post->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <!-- Título Post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="titulo"> {{ __('Título') }}</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $post->titulo }}" aria-label="titulo" required>
                                    @error('titulo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <!-- Comentario Post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="comentario"> {{ __('Comentario') }}</label>
                                    <textarea placeholder="Añada aquí el texto del Post" id="comentario" name="comentario" class="form-control" value="{{ $post->comentario }}" aria-label="comentario" required>{{ $post->comentario }}</textarea>
                                    @error('comentario')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Archivado -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group mb-3">                                    
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="archivado">{{ __('Archivar') }}</label>                              
                                        <input class="form-check-input" type="hidden" name="archivado" id="0" value="0" @if (!$post->archivado) @checked(false) @endif>
                                        <input class="form-check-input" type="checkbox" name="archivado" id="1" value="1" @if ($post->archivado) @checked(true) @endif>
                                    </div>                          
                                    @error('archivado')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                                     
                            <!-- Autor ID -->                        
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="autor" name="autor" class="form-control" value="{{ $post->$autor=Auth::user()->id }}">
                                </div>
                            </div>
                        
                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{_('Actualizar')}}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   

    <!-- fin col contenido panel Editar post Preinscripción-->


@endsection