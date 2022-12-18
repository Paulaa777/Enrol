@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido index plazo -->
    
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Plazos')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2">
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('dashboard') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <i class="fa-solid fa-house-user me-2"></i>
                            <span class="d-none d-sm-inline">{{__('Volver Inicio')}}</span>
                          </a>
                    </div>
                </div>  

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                        <a href="{{ route('plazos.create') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                          <i class="fa-solid fa-key me-2 me-2"></i>
                          <span class="d-none d-sm-inline">{{__('Cambiar Estado Plazos')}}</span>
                        </a>
                    </div>
                </div>                      
               
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <span><h4 class="text-center">{{__('Estado Actual Plazos')}}</h4></span>
                
            <div class="container d-flex justify-content-center my-5 mx-auto">
               
                <div class="table-responsive w-auto">

                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr class="text-center mx-auto">
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Tipo Plazo') }}</th>
                                <th>{{ __('Estado') }}</th>
                                <th>{{ __('Editor') }}</th>
                                <th>{{ __('Actualizado') }}</th>
                                <th >{{ __('Acción') }}</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($plazos as $plazo)
                                <tr class="text-center align-middle">
                                    <td>{{ $plazo->id }}</td>                                    
                                    <td>{{ $plazo->tipo_plazo }}</td>
                                    <td> @if ($plazo->estado==1) {{ __('ABIERTO')}} @else  {{ __('CERRADO')}} @endif</td>
                                    <td>{{ $plazo->editor }}</td>
                                    <td>{{ date('d-m-Y h:i:s', strtotime($plazo->updated_at)) }}</td>
                                    <td class="text-center align-middle">
                                        <form action="{{ route('plazos.destroy',$plazo->id) }}" method="Post" class="delete">
                                           
                                            <a href="{{ route('plazos.show',  $plazo->id) }}"><i class="fa-solid fa-eye mx-3 fs-5"></i></a>
                                           
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
    <!-- fin col contenido index plazo-->

@endsection