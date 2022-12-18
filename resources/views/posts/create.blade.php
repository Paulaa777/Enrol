@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Añadir Post-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Añadir Post')}}</h3>
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

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-2">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif
                    

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="row">

                            <!-- Tipo Post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <label for="tipo"> {{ __('Tipo') }}</label>
                                <div class="form-group mb-3">                                    
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" aria-label="noticia" name="tipo" id="noticia" value="Noticia" @if(old('tipo')) checked @endif>
                                        <label class="form-check-label" for="noticia" >{{ __('Noticia') }}</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" aria-label="tipo aviso" name="tipo" id="aviso" value="Aviso" @if(old('tipo')) checked @endif>
                                        <label class="form-check-label" for="aviso">{{ __('Aviso') }}</label>
                                    </div>
                                    
                                    @error('tipo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Título Post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="titulo"> {{ __('Título') }}</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" aria-label="titulo" required>
                                    @error('titulo')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <!-- Comentario Post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="comentario"> {{ __('Comentario') }}</label>
                                    <textarea placeholder="Añada aquí el texto del Post" id="comentario" name="comentario" class="form-control" value="{{ old('comentario') }}" aria-label="comentario" required>{{ old('comentario') }}</textarea>
                                    @error('comentario')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <!-- Autor ID -->                        
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group">
                                    <input type="hidden" id="autor" name="autor" class="form-control" value="{{ $autor=Auth::user()->id }}">
                                </div>
                            </div>
                        
                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{_('Añadir')}}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   

{{-- @dd($post) --}}
    <!-- fin col contenido panel Añadir post-->


@endsection