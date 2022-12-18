@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido panel Ajustes-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{__('Ajustes')}}</h3>
            </div>        
      
        </div>
     
        <div class="container my-2"> 
            
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ url('/dashboard') }}"  class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{__('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container justify-content-center my-5 mx-auto ">
            
            
                <div class="container w-auto my-5">                    
                 
                    <div class="row my-5">

                        <div class="col-xl-4 col-sm-6 py-2">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body bg-success">
                                    <div class="rotate">
                                        <i class="fa fa-user fa-4x mb-2"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{ __("Perfil") }}</h6>
                                   
                                    <div class="mx-auto my-5">
                                        <a href="{{ route('users.profile.edit', Auth::user()->id) }}"  class="p-2 text-light"> 
                                          <i class="fa-solid fa-pen-to-square fs-3 me-2"></i>
                                          <span class="d-none d-sm-inline">{{ __('Editar Perfil')}}</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                      

                        <div class="col-xl-4 col-sm-6 py-2">
                            <div class="card text-white bg-info h-100">
                                <div class="card-body bg-secondary">
                                    <div class="rotate">
                                        <i class="fa-solid fa-key mb-2 fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{__('Password')}}</h6>
                                    
                                    <div class="mx-auto my-5">
                                        <a href="{{ route('users.profilePassword.edit', Auth::user()->id) }}" class="p-2 text-light"> 
                                          <i class="fa-solid fa-arrow-rotate-right fs-3 me-2"></i>
                                          <span class="d-none d-sm-inline">{{ __('Cambiar Password')}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 py-2">
                            <div class="card text-white bg-danger h-100">
                                <div class="card-body">
                                    <div class="rotate">
                                        <i class="fa-solid fa-address-card mb-2 fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase">{{_('Cuenta')}}</h6>
                                    <div class="mx-auto my-5">
                                        <form action="{{ route('users.profile.destroy', Auth::user()->id) }}" method="Post" class="deleteUser">
                                            @csrf
                                             @method('DELETE')
                                                <button class="btn m-0 p-0" type="submit" id="btn-delete">                                              
                                                <a class="p-2 text-light">
                                                    <i class="fa-solid fa-trash-can fs-3 me-2"></i>
                                                    <span class="d-none d-sm-inline">{{ __('Eliminar Cuenta')}}</span>
                                                </a>                             
                                             </button>
                                         </form>                        
                                    </div>   
                                </div>
                            </div>
                        </div>

                      
                    </div>


                    
                </div>

            </div>

        </div>
     
    </div>   
    <!-- fin col contenido panel Ajustes-->


@endsection