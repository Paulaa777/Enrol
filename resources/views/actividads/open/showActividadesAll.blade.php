@extends('layouts.app_layout')

@section('contenido')

    <!-- fin col contenido show Actividades Disponibles-->
    <div class="my-3 mt-5 py-2 mx-5 rounded-4 border shadow">

     
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Actividades Disponibles')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ url('/') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <i class="fa-solid fa-house mx-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                           
                          </a>
                    </div>
                </div> 

          
            <div class="container my-5 w-auto">

                <div class="container justify-content-center my-5 mx-auto">

                    
                    <div class="mb-5">
                          <!-- Tipo -->
                          <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                            <div class="form-group mb-3">
                                <label for="tipo">{{ __('Tipo') }} </label>
                                <select class="form-select" id="tipo" aria-label="tipo">
                                    <option value="all">{{ __('Todas') }}</option>
                                    <option value="cultural">{{ __('Cultural') }}</option>
                                    <option value="deportiva">{{ __('Deportiva') }}</option>
                                    <option value="tecnologica">{{ __('Tecnológica') }}</option>
                                </select>
                               
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="table-responsive">
    
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>{{ __('Nombre Actividad') }}</th>
                                    <th>{{ __('Categoría') }}</th>
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
                                {{-- 
                                @foreach ($actividades as $actividad)                            
                                
                                    <tr class="text-center align-middle">
                                        <td>{{ $actividad->nombre_actividad }}</td>
                                        <td>{{ $actividad->categoria }}</td>
                                        <td> @if($actividad->lunes==1)  <i class="fa-solid fa-check"></i> @else  {{ __(' ')}} @endif </td>
                                        <td> @if($actividad->martes==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->miercoles==1)<i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->jueves==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td> @if($actividad->viernes==1)  <i class="fa-solid fa-check"></i> @else  {{ __('')}} @endif </td>
                                        <td>{{ $actividad->hora_inicio }}</td>
                                        <td>{{ $actividad->hora_fin }}</td>
                                       
                                    </tr>
                                   
                                @endforeach
                              --}} 
                            </tbody>
                        </table>
    
                    </div>
                </div>

            </div>
         
        </div>
        
           

    </div>   
    <!-- fin col contenido show Actividades Disponibles -->

@endsection