@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido show Usuario-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>Detalle Usuario</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('users.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">Volver</span>
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

                <div class="table-responsive">
                
                    <table class="table align-middle">
                        <tbody>
                            
                            @role('Super_Admin')
                            <tr>
                                <th>{{ __('Role') }}</th>
                                <td>{{ $user->getRoleNames()->implode(' '); }}</td>
                            </tr>
                            @endrole
                            
                            <tr>
                                <th>{{ __('Nombre') }}</th>
                                <td>{{ $user->nombre }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Apellidos') }}</th>
                                <td>{{ $user->apellidos }}</td>                            
                            </tr>
                            <tr>
                                <th>{{ __('DNI|NIF|NIE') }}</th>
                                <td>{{ $user->nif }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Fecha Nacimiento') }}</th>
                                <td>{{ date('d-m-Y', strtotime($user->nacimiento)) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Email') }}</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                           
                            <tr>
                                <th>{{ __('Móvil') }}</th>
                                <td> {{ $user->movil }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Dirección') }}</th> 
                                <td>{{ $user->direccion }}</td> 
                            </tr>
                            <tr>                      
                                <th>{{ __('Municipio') }}</th>
                                <td>{{ $user->municipio }}</td>                           
                            </tr>
                            <tr>
                                <th>{{ __('Provincia') }}</th>
                                <td>{{ $user->provincia }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Código Postal') }}</th>
                                <td>{{ $user->codigo_postal }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Acción') }}</th>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="Post" class="delete">
                                       
                                        <a href="{{ route('users.index') }}"><i class="fa-solid fa-rectangle-list me-3 fs-5"></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>
                                       
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
    <!-- fin col contenido show Usuario -->

@endsection