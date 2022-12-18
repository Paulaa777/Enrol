@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Cambiar Password-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>Cambiar Password Usuario {{ Auth::user()->nombre}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="/dashboard" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">Volver</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-3 mx-auto">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('users.profilePassword.update', Auth::user()->id) }}" >
                        @method('PUT')
                        @csrf

                        <div class="row">
                       
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="password"> {{ __('Nueva Password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" aria-label="password" required>
                                    @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                       
                            <!-- Password Confirm -->
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation"> {{ __('Confirme Password') }}</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password_confirmatio') }}" aria-label="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>  
                        
                                         
                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">Editar</button>
                            </div>
                        </div>
                   
                    </form>
                </div>

            </div>

        </div>

    </div>   

    <!-- fin col contenido panel Cambiar Password-->


@endsection