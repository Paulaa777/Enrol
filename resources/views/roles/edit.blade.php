@extends('layouts.panel_layout')

@section('contenido-panel')


    <!-- col contenido  panel Editar Roles-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">
      
        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Editar Rol')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-between">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('roles.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
                          </a>
                    </div>
                </div>  
               
            </div>

            <div class="container justify-content-center my-5 mx-auto rounded-4 border form-background">
            
            
                <div class="container w-auto mt-2">
                    
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                    @elseif(session('alert'))
                    <div class="alert alert-danger mb-1 mt-1">
                        {{ session('alert') }}
                    </div>
                    @endif
                    

                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <!-- Nombre Rol -->
                            <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                                <div class="form-group mb-3">
                                    <label for="name"> {{ __('Rol Name') }}</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" aria-label="name" required>
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <label for="permissions" class="form-label">{{__('Asignar Permisos')}}</label>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                    <th scope="col" width="20%">{{__('Permission Name')}}</th>
                                    <th scope="col" width="1%">{{__('Guard Name')}}</th> 
                                </thead>
            
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" 
                                            name="permission[{{ $permission->name }}]"
                                            value="{{ $permission->name }}"
                                            class='permission'
                                            {{ in_array($permission->name, $rolePermissions) 
                                                ? 'checked'
                                                : '' }}>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>


                            <div class="mx-auto text-center my-3">
                                <button type="submit" class="boton-envio rounded-3 px-5 py-2">{{_('Actualizar')}}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>   

 
    <!-- fin col contenido panel Editar Rol-->


@endsection