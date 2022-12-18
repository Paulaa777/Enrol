@extends('layouts.panel_layout')

@section('contenido-panel')

    <!-- fin col contenido show Role-->
    <div class="col my-3 mt-5 py-2 ms-3 rounded-4 border shadow">

        <div class="my-3">

            <div class="mb-3 text-center">
                <h3>{{ __('Detalle Rol')}}</h3>
            </div>        
      
        </div>
        
        <div class="container my-2"> 
            <div class="row my-5 d-flex justify-content-start">

                <div class="col-lg-auto my-2">
                    <div class="mx-auto">
                          <a href="{{ route('roles.index') }}" class="btn btn-outline-dark nav-link p-2 border border-opacity-75 shadow-sm"> 
                            <i class="fa-solid fa-arrow-left-long me-2"></i>
                            <span class="d-none d-sm-inline">{{ __('Volver')}}</span>
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
                                <th>{{ __('ID') }}</th>
                                <td>{{ $role->id }}</td>                           
                            </tr>
                            <tr>
                                <th>{{ __('role Name') }}</th>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Guard Name') }}</th>
                                <td>{{ $role->guard_name }}</td>                            
                            </tr>
                            
                            <tr>
                                <th>{{ __('Permisos') }}</th>
                                @forelse ($role->permissions as $permission)
                                    <td><span class="badge bg-success">{{ $permission->name }}</span></td>
                                @empty
                                    <td><span class="badge bg-danger">{{__('Sin Permisos')}}</span></td>
                                @endforelse
                                {{--
                                @foreach($rolePermissions as $permission)                                
                                    <td>{{ $permission->name }}</td>                               
                                @endforeach
                                --}}
                            </tr>
                            
                            <tr>
                                <th>{{ __('Permisos Guard Name') }}</th> 
                                @forelse ($role->permissions as $permission)
                                    <td><span class="badge bg-success">{{ $permission->guard_name }}</span></td>
                                @empty
                                    <td><span class="badge bg-danger">{{__('Sin Permisos')}}</span></td>
                                @endforelse 
                                {{--                              
                                @foreach($rolePermissions as $permission)
                                    <td>{{ $permission->guard_name }}</td>                            
                                @endforeach 
                                --}}
                            </tr>
                            <tr>
                                <th>{{ __('Creado') }}</th>
                                <td> {{ $role->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Actualizado') }}</th>
                                <td>{{ $role->updated_at }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('Acción') }}</th>
                                <td>
                                    <form action="{{ route('roles.destroy',$role->id) }}" method="Post" class="delete">
                                       
                                        <a href="{{ route('roles.index') }}"><i class="fa-solid fa-rectangle-list me-3 fs-5"></i></a>
                                        <a href="{{ route('roles.edit', $role->id) }}"><i class="fa-solid fa-pencil mx-3 fs-5"></i></a>
                                       
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn m-0 p-0" type="submit" id="btn-delete">                                              
                                            <a><i class="fa-solid fa-trash-can mx-3 fs-5"></i></a>                             
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>

                </div>

            </div>
         
        </div>
        
           

    </div>   
    <!-- fin col contenido show Role -->

@endsection