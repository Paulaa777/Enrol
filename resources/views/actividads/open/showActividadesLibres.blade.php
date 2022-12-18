@extends('layouts.app_layout')

@section('contenido')

    <!-- fin col contenido show Actividades con Plazas Libres-->
    <div class="my-3 mt-5 py-2 mx-5 rounded-4 border shadow">

     
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Actividades con Plazas Libres')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ url('/') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <i class="fa-solid fa-house mx-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                           
                          </a>
                    </div>
                </div> 

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-file-pen me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Inscribirse')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>


            <div class="container my-5 w-auto">

                <div class="container justify-content-center my-5 mx-auto">

                    <div class="table-responsive">
    
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>{{ __('Categoría') }}</th>
                                    <th>{{ __('Nombre Actividad') }}</th>                                   
                                    <th>{{ __('Lunes') }}</th>
                                    <th>{{ __('Martes') }}</th>
                                    <th>{{ __('Miércoles') }}</th>
                                    <th>{{ __('Jueves') }}</th>
                                    <th>{{ __('Viernes') }}</th>  
                                    <th>{{ __('Hora Inicio') }}</th>
                                    <th>{{ __('Hora Fin') }}</th> 
                                                         
                                </tr>
                            </thead>
                            <tbody>
                                                                 
                                @forelse ($actividades as $actividad) 
                                            
                                    <tr class="text-center align-middle">
                                        <td>{{ $actividad->categoria }}</td>
                                        <td>{{ $actividad->nombre_actividad }}</td>                                        
                                        <td> @if($actividad->lunes==1)  <i class="fa-solid fa-check"></i> @else  {{ __(' ')}} @endif </td>
                                        <td> @if($actividad->martes==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->miercoles==1)<i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->jueves==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->viernes==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td>{{ $actividad->hora_inicio }}</td>
                                        <td>{{ $actividad->hora_fin }}</td>
                                       
                                    </tr>
                                        
                                @empty
                                    
                                    <tr><span class="text-danger">{{__('NO HAY ACTIVIDADES CON PLAZAS LIBRES')}}</span></tr>    

                                @endforelse
                               
                            </tbody>
                        </table>
    
                    </div>
                </div>

            </div>
         

            <div class="row my-3 d-flex justify-content-around">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('inscripcions.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-file-pen me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Inscribirse')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

        </div>
        
           

    </div>   
    <!-- fin col contenido show Actividades con Plazas Libres -->

@endsection