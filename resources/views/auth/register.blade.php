{{--@extends('layouts.app')

@section('content') --}}

@extends('layouts.app_layout')

@section('contenido')

<div class="container py-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fs-5">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--apellidos-->
                        <div class="row mb-3">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--apellidos-->

                        <!--nif-->
                        <div class="row mb-3">
                            <label for="nif" class="col-md-4 col-form-label text-md-end">{{ __('NIF | NIE') }}</label>

                            <div class="col-md-6">
                                <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" required autocomplete="nif" autofocus>

                                @error('nif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--nif-->

                        <!-- nacimento -->
                        <div class="row mb-3">
                            <label for="nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Año Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="nacimiento" type="date" class="form-control @error('nacimiento') is-invalid @enderror" name="nacimiento" value="{{ old('nacimiento') }}" required autocomplete="nacimiento" autofocus>

                                @error('nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--móvil-->

                         <!--móvil -->
                         <div class="row mb-3">
                            <label for="movil" class="col-md-4 col-form-label text-md-end">{{ __('Móvil') }}</label>

                            <div class="col-md-6">
                                <input id="movil" type="text" class="form-control @error('movil') is-invalid @enderror" name="movil" value="{{ old('movil') }}" required autocomplete="movil" autofocus>

                                @error('movil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--móvil-->


                         <!--dirección -->
                         <div class="row mb-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--dirección-->

                        <!--código postal -->
                        <div class="row mb-3">
                            <label for="codigo_postal" class="col-md-4 col-form-label text-md-end">{{ __('Código Postal') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_postal" type="number" class="form-control @error('codigo_postal') is-invalid @enderror" name="codigo_postal" value="{{ old('codigo_postal') }}" required autocomplete="codigo_postal" autofocus>

                                @error('codigo_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--código postal-->

                        <!--municipio -->
                        <div class="row mb-3">
                            <label for="municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <input id="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{ old('municipio') }}" required autocomplete="municipio" autofocus>

                                @error('municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--municipio-->

                        <!--provincia -->
                        <div class="row mb-3">
                            <label for="provincia" class="col-md-4 col-form-label text-md-end">{{ __('Provincia') }}</label>

                            <div class="col-md-6">
                                <input id="provincia" type="text" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{ old('provincia') }}" required autocomplete="provincia" autofocus>

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--provincia-->

                         
                        <!-- email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--password-->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="boton-envio rounded-3 px-3 py-2">
                                    {{ __('Registro') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
