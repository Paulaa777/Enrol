@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido index Preinscripcion-->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Preinscripciones')}}</h3>
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
                        <a href="{{ route('preinscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                          <i class="fa-solid fa-plus me-2"></i>
                          <span class="d-none d-sm-inline">{{ __('Añadir Preinscripcion')}}</span>
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
                                {{-- <th>{{ __('Código Usuario') }}</th>  --}}  
                                <th>{{ __('Año') }}</th> 
                                <th>{{ __('Código Preinscripción') }}</th>    
                                <th>{{ __('Código Participante') }}</th> 
                                <th>{{ __('Nombre, Apellidos') }}</th>
                                <th>{{ __('DNI|NIF|NIE') }}</th>                                                               
                                <th>{{ __('Código Actividad') }}</th>                              
                                <th>{{ __('Actividad, Categoria') }}</th>  
                                <th>{{ __('Plaza Obtenida') }}</th> 
                                <th>{{ __('Plaza Obtenida') }}</th> 
                                  
                               <th>{{ __('Acción') }}</th>     
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preinscripciones as $preinscripcion)
                                <tr class="text-center align-middle">
                                    {{-- <td>{{ $preinscripcion->cod_usuario }}</td>  --}} 
                                    <td>{{ $preinscripcion->año_actividad }}</td>
                                    <td>{{ $preinscripcion->id }}</td> 
                                    <td>{{ $preinscripcion->cod_participante }}</td>                                     
                                    <td>{{ $preinscripcion->nombre_participante }}<br> {{ __('')}} {{ $preinscripcion->apellidos_participante }}</td>
                                    <td>{{ $preinscripcion->dni_participante }}</td>
                                    <td>{{ $preinscripcion->cod_actividad }}</td>   
                                    <td>{{ $preinscripcion->nombre_actividad }} {{ __(', ')}} {{ $preinscripcion->categoria }}</td>                              
                                    <td> @if($preinscripcion->plaza_obtenida=='SI')  {{ __('SI')}} @elseif($preinscripcion->plaza_obtenida=='NO')  {{ __('No')}}   @else  {{ __('Pendiente')}} @endif </td>
                                    @if($preinscripcion->plaza_obtenida=='SI')
                                        <td>
                                            <div class="mx-auto">
                                                <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-1 border border-opacity-75"> 
                                                <i class="fa-solid fa-plus me-2"></i>
                                                <span class="d-none d-sm-inline">{{ __('Inscribirse')}}</span>
                                                </a>
                                            </div>
                                        </td>
                                    @else
                                         <td>
                                            <div class="mx-auto">
                                              <span>{{__('-')}}</span> 

                                            </div>
                                        </td>
                                    @endif
                                    
                                    <td class="text-center align-middle">
                                        <form action="{{ route('preinscripcions.destroy',$preinscripcion->id) }}" method="Post" class="delete">
                                           
                                            <a href="{{ route('preinscripcions.show',  $preinscripcion->id) }}"><i class="fa-solid fa-eye mx-3 fs-5"></i></a>
                                            
                                            @hasrole('Admin|Super_Admin')
                                                <a href="{{ route('preinscripcions.edit', $preinscripcion->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>
                                            @endhasrole

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
    <!-- fin col contenido index preinscripcion-->

@endsection