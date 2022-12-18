@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido Listados Plazas Preinscripcions-->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Listados Plazas Actividades Preincripciones')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('preinscripcions.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                        <a href="{{ route('preinscripcions.asignarPlazasPreinscripcion.edit') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                          <i class="fa-regular fa-square-check me-2"></i>
                          <span class="d-none d-sm-inline">{{ __('Asignar Plazas')}}</span>
                        </a>
                    </div>
                </div>                      
               
            </div>

          
            <div class="container d-flex justify-content-around my-5 mx-auto">


                <div class="table-responsive w-auto">
                    <span class="mx-auto">
                        <h5 class="text-center mb-2 fw-bold text-primary">{{__('NO ALCANZA MÍNIMO PLAZAS')}}</h5>
                    </span>
               
                    <table class="table table-bordered align-middle w-auto mt-2">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>{{ __('Código Actividad') }}</th>                              
                                <th>{{ __('Actividad') }}</th>  
                                <th>{{ __('Categoria') }}</th>  
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividadesSinMinimo as $sinMinimo)
                                <tr class="text-center align-middle">
                                    <td>{{ $sinMinimo->id }}</td>   
                                    <td>{{ $sinMinimo->nombre_actividad }} </td>
                                    <td>{{ $sinMinimo->categoria }}</td>                              
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


                <div class="table-responsive w-auto"> 
                    <span class="mx-auto">
                        <h5 class="text-center mb-2 fw-bold text-success">{{__('PLAZAS COMPLETAS')}}</h5>
                    </span>
                
                    <table class="table table-bordered align-middle w-auto">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>{{ __('Código Actividad') }}</th>                              
                                <th>{{ __('Actividad') }}</th>  
                                <th>{{ __('Categoria') }}</th>  
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividadesCompletas as $completas)
                                <tr class="text-center align-middle">
                                    <td>{{ $completas->id }}</td>   
                                    <td>{{ $completas->nombre_actividad }}</td>
                                    <td>{{ $completas->categoria }}</td>                              
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> 

                <div class="table-responsive w-auto">
                    <span class="mx-auto">
                        <h5 class="text-center mb-2 fw-bold text-danger">{{__('SOBREPASA PLAZAS')}}</h5>
                    </span>
               
                    <table class="table table-bordered align-middle w-auto mt-2">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>{{ __('Código Actividad') }}</th>                              
                                <th>{{ __('Actividad') }}</th>  
                                <th>{{ __('Categoria') }}</th>  
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividadesSobrepasa as $sobrepasa)
                                <tr class="text-center align-middle">
                                    <td>{{ $sobrepasa->id }}</td>   
                                    <td>{{ $sobrepasa->nombre_actividad }} </td>
                                    <td>{{ $sobrepasa->categoria }}</td>                              
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>



            </div>
         
        </div>
    
        

    </div>   
    <!-- fin col contenido Listados Plazas Preinscripcions-->

@endsection