@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido Edit Preinscripcion Plazas Superadas-->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Listado Preinscripciones Plazas Superadas')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('preinscripcions.indexAsignarPlazasPre.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver Asignar Plazas')}}</span>
                          </a>
                    </div>
                </div>                                  
               
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('success') }}
                </div>
            @elseif(session('alert'))
                <div class="alert alert-danger mb-1 mt-1">
                    {{ session('alert') }}
                </div>
            @endif
                    

            <form method="POST" action="{{ route('preinscripcions.updateAsignarPlazasPreSuperadas.update' ,$preinscripcion) }}" >
                @method('PUT')
                @csrf

                <div class="container d-flex justify-content-center my-5 mx-auto">

                    <div class="table-responsive">
                        <span class="mx-auto">
                            <h5 class="text-center mb-5 fw-bold text-danger">{{__('PREINSCRIPCIONES PLAZAS SUPERADAS')}}</h5>
                        </span>
                   
                        <table class="table table-bordered align-middle w-auto">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    {{-- <th>{{ __('Código Usuario') }}</th>  --}}  
                                    <th>{{ __('Año') }}</th> 
                                    <th>{{ __('Código Preinscripción') }}</th>    
                                    <th>{{ __('Código Participante') }}</th> 
                                    <th>{{ __('Código Actividad') }}</th>                              
                                    <th>{{ __('Asignar Plaza') }}

                                       <input type="checkbox" name="all_plaza_obtenida">                                     

                                    </th>
                     
                                    <th>{{ __('Plaza Obtenida') }}</th> 
                                    <th>{{ __('Plaza Obtenida') }}</th> 
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($preinscripcion as $superada)

                                        <tr class="text-center align-middle">
                                            {{-- <td>{{ $superada->cod_usuario }}</td>  --}} 
                                            <td>{{ $superada->año_actividad }}</td>
                                            <td>{{ $superada->id }}</td> 
                                            <td>{{ $superada->cod_participante }}</td>                                     
                                            <td>{{ $superada->cod_actividad }}</td>   
                                            <td>                                                
                                                    <input type="checkbox" 
                                                    name="plaza_obtenida[{{ $superada->plaza_obtenida }}]"
                                                    value="{{$superada->plaza_obtenida}}"
                                                    class='plaza_obtenida'>
                                              
                                            </td>
                                          
                                            <td> @if($superada->plaza_obtenida=='SI')  {{ __('SI')}} @elseif($superada->plaza_obtenida=='NO')  {{ __('No')}}   @else  {{ __('Pendiente')}} @endif </td>
                                            @if($superada->plaza_obtenida=='SI')
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
                                            
                                            
                                        </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
         
                <div class="mx-auto text-center my-3">
                    <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{ __('Actualizar')}}</button>
                </div>           

            </form>

        </div>
    
        

    </div>   
    <!-- fin col contenido Edit Preinscripcion Plazas Superadas -->

@endsection