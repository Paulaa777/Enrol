@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido panel Añadir Usuario-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Añadir Usuario')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('users.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
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
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('users.store') }}" >
                        @csrf

                        <div class="row">


                            @role('Super_Admin')
                            <!-- Nombre Rol -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="role"> {{ __('Rol Name') }}</label>
                                     <select class="form-select" id="role" name="role" class="form-control" value="{{ old('role') }}" aria-label="rol name">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" @selected(old('role' == $role))>{{ __($role) }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @error('role')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endrole

                            <!-- Nombre  -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nombre"> {{ __('Nombre') }}</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre')}}" aria-label="nombre" required>
                                    @error('nombre')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <!-- Apellidos -->                           
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="apellidos"> {{ __('Apellidos') }}</label>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ old('apellidos')}}" aria-label="apellidos" required>
                                    @error('apellidos')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- DNI|NIF|NIE -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nif"> {{ __('DNI|NIF|NIE') }}</label>
                                    <input type="text" id="nif" name="nif" class="form-control" value="{{ old('nif')}}" aria-label="nif" required>
                                    @error('nif')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                  

                             <!-- Fecha Nacimiento -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="nacimiento"> {{ __('Fecha de Nacimiento') }}</label>
                                    <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="{{ old('nacimiento')}}" aria-label="nacimiento" required>
                                    @error('nacimiento')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Móvil -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="movil"> {{ __('Móvil') }}</label>
                                    <input type="tel" id="movil" name="movil" class="form-control" value="{{ old('movil')}}" aria-label="movil" required>
                                    @error('movil')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="direccion"> {{ __('Dirección') }}</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion')}}" aria-label="direccion" required>
                                    @error('direccion')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Municipio -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="municipio"> {{ __('Municipio') }}</label>
                                    <input type="text" id="municipio" name="municipio" class="form-control" value="{{ old('municipio')}}" aria-label="municipio" required>
                                    @error('municipio')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Provincia -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="provincia"> {{ __('Provincia') }}</label>
                                    <input type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia')}}" aria-label="provincia" required>
                                    @error('provincia')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                             <!-- Código Postal -->
                             <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="codigo_postal"> {{ __('Código Postal') }}</label>
                                    <input type="number" min="1000" max="999999" id="codigo_postal" name="codigo_postal" class="form-control" value="{{ old('codigo_postal')}}" aria-label="codigo_postal" required>
                                    @error('codigo_postal')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="email"> {{ __('Email') }}</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}" aria-label="email" required>
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Password -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="password"> {{ __('Password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password')}}" aria-label="password" required>
                                    @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Confirm -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="password_confirmation"> {{ __('Confirme Password') }}</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password_confirmation')}}" aria-label="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>                         
                        
                            
                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">Añadir</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   
    <!-- fin col contenido panel Añadir Usuario-->


@endsection