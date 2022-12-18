@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido panel-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

       
        <div class="my-5">

            <div class="mb-3 text-center">
                <h3>{{__('Hola')}} {{ Auth::user()->nombre}} {{__('!')}}</h3>
                <h3>{{__('Bienvenid@ a tu Área Personal')}}</h3>
                
            </div>        
      
        </div>
        
        <div class="container justify-content-center my-5 mx-auto ">
            
            
            <div class="container w-auto my-5">                    
             
                <div class="row my-5">


                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card shadow bg-success text-white h-100">
                            <div class="card-body bg-success">
                                <div class="rotate">
                                    <i class="fa-solid fa-users fa-4x mb-2"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{ __("Participantes") }}</h6>
                                
                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$participantes}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>
                  

                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-info h-100">
                            <div class="card-body bg-secondary">
                                <div class="rotate">
                                    <i class="fa-regular fa-file-lines mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{__('Preinscripciones')}}</h6>
                                
                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$preinscripciones}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-danger h-100">
                            <div class="card-body">
                                <div class="rotate">
                                    <i class="fa-solid fa-file-lines mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{_('Inscripciones')}}</h6>
                                
                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$inscripciones}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>


                    @hasrole('User|Admin')
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-primary h-100">
                            <div class="card-body">
                                <div class="rotate">
                                    <i class="fa-solid fa-user mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{_('Usuario')}}</h6>
                                <div class="mx-auto my-3">
                                    <p class="text-center">{{__('Usuario Registrado Desde')}}</p>
                                    <h5 class="text-center">{{ date('d-m-Y h:i:s', strtotime($usuarioLogueado->created_at))}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endhasrole

                    @hasrole('Admin|Super_Admin')
                   
                        <div class="col-xl-3 col-sm-6 py-2">
                            <div class="card text-white bg-primary h-100">
                                <div class="card-body">
                                    <div class="rotate">
                                        <i class="fa-solid fa-users-gear mb-2 fa-4x"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-2">{{_('Usuarios')}}</h6>
                                   
                                    <div class="mx-auto my-3">
                                        <h1 class="display-3 text-center">{{$usuarios}}</h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                

               {{-- </div>



                <div class="row my-5"> --}}

                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body bg-warning">
                                <div class="rotate">
                                    <i class="fa fa-user fa-4x mb-2"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{ __("Actividades") }}</h6>
                               
                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$actividades}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>
                  

                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-primary h-100">
                            <div class="card-body bg-primary ">
                                <div class="rotate">
                                    <i class="fa-solid fa-people-group mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase">{{__('Monitores')}}</h6>
                                
                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$monitores}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-secondary h-100">
                            <div class="card-body">
                                <div class="rotate">
                                    <i class="fa-solid fa-newspaper mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{_('Posts')}}</h6>

                                <div class="mx-auto my-3">
                                    <h1 class="display-3 text-center">{{$posts}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endhasrole
                   
                    @role('Super_Admin')
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-success h-100">
                            <div class="card-body">
                                <div class="rotate">
                                    <i class="fa-solid fa-hand mb-2 fa-4x"></i>
                                </div>
                                <h6 class="text-uppercase mt-2">{{_('Roles y Permisos')}}</h6>
                                <div class="d-flex justify-content-center">
                                    <div class="mx-auto my-3">
                                        <h1 class="display-3 mb-0">{{$roles}}</h1>
                                        <h6 class="text-uppercase mt-0">{{__('Roles')}}</h6>
                                    </div>
                                    <div class="mx-auto my-3">
                                        <h1 class="display-3 text-center mb-0">{{$permisos}}</h1>
                                        <h6 class="text-uppercase mt-0">{{__('Roles')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole                

                </div>

                
            </div>

        </div>

        

    </div>   
    <!-- fin col contenido panel-->

@endsection