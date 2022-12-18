@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido show plazo-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Detalle Plazo')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('plazos.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
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
                            <tr>
                                <th>{{ __('Tipo Plazo') }}</th>
                                <td class="text-uppercase fw-semibold">{{ $plazo->tipo_plazo }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Estado') }}</th>
                                <td class="text-uppercase fw-semibold"> @if($plazo->estado)  {{ __('ABIERTO')}} @else  {{ __('CERRADO')}} @endif</td>
                            </tr>
                            <tr>
                                <th>{{ __('Editor ID') }}</th>
                                <td>{{ $plazo->editor }}</td>                            
                            </tr>
                            
                            @foreach($c_editor as $editor)
                                <tr>
                                    <th>{{ __('Editor Nombre') }}</th>
                                    <td>{{ $editor->nombre }} {{ $editor->apellidos }}</</td>                            
                                </tr>
                            @endforeach
                            
                            <tr>
                                <th>{{ __('Creado') }}</th> 
                                <td>{{ $plazo->created_at }}</td> 
                            </tr>

                            <tr>
                                <th>{{ __('Acción') }}</th>
                                <td>
                                    
                                   <a href="{{ route('plazos.index') }}"><i class="fa-solid fa-rectangle-list me-3 fs-5"></i></a>
                                        
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>

                </div>

            </div>
         
        </div>
        
           

    </div>   
    <!-- fin col contenido show plazo -->

@endsection