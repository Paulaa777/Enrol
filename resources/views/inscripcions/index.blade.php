@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido index Inscripcion-->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Inscripciones')}}</h3>
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
                        <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                          <i class="fa-solid fa-plus me-2"></i>
                          <span class="d-none d-sm-inline">{{ __('Añadir Inscripcion')}}</span>
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
                            <tr class="text-center mx-auto">
                                {{-- <th>{{ __('Código Usuario') }}</th> --}}
                                <th>{{ __('Año') }}</th> 
                                <th>{{ __('Código Inscripción') }}</th>    
                                <th>{{ __('Código Participante') }}</th> 
                                <th>{{ __('Nombre, Apellidos') }}</th>
                                <th>{{ __('DNI|NIF|NIE') }}</th>                                
                                <th>{{ __('Código Actividad') }}</th>                              
                                <th>{{ __('Actividad, Categoria') }}</th> 
                                <th>{{ __('Acción') }}</th>     
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscripciones as $inscripcion)
                           
                                <tr class="text-center align-middle">
                                    {{-- <td>{{ $inscripcion->c_usuario }}</td> --}}
                                    <td>{{ $inscripcion->año_actividad }}</td>
                                    <td>{{ $inscripcion->id }}</td> 
                                    <td>{{ $inscripcion->c_participante }}</td> 
                                    <td>{{ $inscripcion->nombre_participante }} {{ __(', ')}} {{ $inscripcion->apellidos_participante }}</td>
                                    <td>{{ $inscripcion->dni_participante }}</td>
                                    <td>{{ $inscripcion->c_actividad }}</td> 
                                    <td>{{ $inscripcion->nombre_actividad }} {{ __(', ')}} {{ $inscripcion->categoria }}</td>
                                    
                                    
                                    <td class="text-center align-middle">
                                        <form action="{{ route('inscripcions.destroy',$inscripcion->id) }}" method="Post" class="delete" id="bajaActividad">
                                           
                                            <a href="{{ route('inscripcions.show',  $inscripcion->id) }}"><i class="fa-solid fa-eye mx-3 fs-5"></i></a>
                                           
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
    <!-- fin col contenido index Inscripcion-->

@endsection