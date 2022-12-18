<!-- Navbar vertical 2-->
<div class="col-auto col-md-3 col-xl-2 px-sm-2 py-2 my-3 mt-5 px-0 bg-dark rounded-4 shadow">
  
  <div class="d-flex flex-column align-items-center align-items-sm-start ms-2 px-0 pt-2 text-white min-vh-100 menuVertical">
    

    @hasrole('Super_Admin')
      <!-- Titulo Menu Super_Admi-->
      <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white fs-5 w-100">
        <i class="fa-solid fa-sliders me-3"></i>
        <span class="d-none d-sm-inline">{{__('Menu SuperAdmin')}}</span>
      </a> 
      <hr>
     

    @else

        @role('User')
        <!-- Titulo Menu Usuarios-->
        <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white fs-5 w-100">
          <i class="fa-solid fa-map me-2"></i>
          <span class="d-none d-sm-inline">{{__('Menu')}}</span>      
        </a>  
        <hr>
        @else

        <!-- Titulo Menu Administradores-->
        <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white fs-5 w-100">
          <i class="fa-solid fa-screwdriver-wrench me-3"></i>
          <span class="d-none d-sm-inline">{{_('Menu Admin')}}</span>
        </a> 
        <hr>
        @endrole

    @endhasrole
       
    
      <!-- Menu Común All Roles -> Usuarios, Admin y Super Admin--> 
      
      <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        

          <!--Participantes-->
          <li class="nav-item fs-5 w-100">
            <a href="#submenuParticipantes" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
              <i class="fa-solid fa-users me-2"></i> 
              <span class="d-none d-sm-inline">{{ __('Participantes')}}</span>
            </a>
                <ul class="collapse nav flex-column ms-1" id="submenuParticipantes" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('participantes.index') }}" class="nav-link ms-2 px-0 text-white fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>
                  <li class="w-100 nav-item">
                    <a href="{{ route('participantes.create') }}" class="nav-link ms-2 px-0 text-white fs-6">
                      <i class="fa-solid fa-user-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>                
                </ul>
          </li>

          <!-- Preinscripciones -->
          <li class="nav-item fs-5 w-100">
            <a href="#submenuPreinscrpciones" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
              <i class="fa-solid fa-list-ol me-2"></i> 
              <span class="d-none d-sm-inline">{{ __('Preinscripciones')}}</span>
            </a>
                <ul class="collapse nav flex-column ms-1" id="submenuPreinscrpciones" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('preinscripcions.index') }}" class="nav-link ms-2 px-0 text-white fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>
                  <li class="w-100 nav-item">
                    <a href="{{ route('preinscripcions.create') }}" class="nav-link ms-2 px-0 text-white fs-6">
                      <i class="fa-solid fa-user-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>     
                  @hasrole('Admin|Super_Admin')
                    <!--Admin SuperAdmin-->  
                    <li class="w-100 nav-item">
                      <a href="{{ route('preinscripcions.listadosPlazasPreinscripcion.index') }}" class="nav-link ms-2 px-0 text-white fs-6">
                        <i class="fa-solid fa-list-check me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Listados Plazas')}}</span>
                      </a>
                    </li>         
                    <li class="w-100 nav-item">
                      <a href="{{ route('preinscripcions.indexAsignarPlazasPre.index') }}" class="nav-link ms-2 px-0 text-white fs-6">
                        <i class="fa-regular fa-square-check me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Asignar Plazas')}}</span>
                      </a>
                    </li> 
                  @endhasrole            
                </ul>
          </li>
        
          <!-- Inscripciones -->
          <li class="nav-item fs-5 w-100">
            <a href="#submenuInscrpciones" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
              <i class="fa-solid fa-list-check me-2"></i> 
              <span class="d-none d-sm-inline">{{ __('Inscripciones')}}</span>
            </a>
                <ul class="collapse nav flex-column ms-1" id="submenuInscrpciones" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('inscripcions.index') }}" class="nav-link ms-2 px-0 text-white fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>
                  <li class="w-100 nav-item">
                    <a href="{{ route('inscripcions.create') }}" class="nav-link ms-2 px-0 text-white fs-6">
                      <i class="fa-solid fa-user-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>                
                </ul>
          </li>

        
          
          <li class="nav-item fs-5 w-100">
            <a href="{{ route('users.profile.show', Auth::user()->id) }}" class="nav-link px-0 align-middle text-white">
              <i class="fa-solid fa-address-card me-2"></i>
              <span class="d-none d-sm-inline">{{__('Cuenta')}}</span>
            </a>
          </li>

          <!-- Fin Menu Común All Roles -> Usuarios, Admin y Super Admin--->

          <hr>

          @hasrole('Admin|Super_Admin')
            <!-- Menu Admin y SuperAdmin -->
        
            <!-- Actividades -->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuActividades" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-tents me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Actividades')}}</span> 
              </a>
                  <ul class="collapse nav flex-column ms-1" id="submenuActividades" data-bs-parent="#menu">
                    <li class="w-100 nav-item">
                      <a href="{{ route('actividads.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                        <i class="fa-solid fa-list-ul me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                      </a>
                    </li>
                    <li class="w-100 nav-item">
                      <a href="{{ route('actividads.create') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                        <i class="fa-solid fa-plus me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                      </a>
                    </li>                  
                  </ul>                
            </li>

            <!-- Monitores -->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuMonitores" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-person-chalkboard"></i>
                <span class="d-none d-sm-inline">{{ __('Monitores')}}</span> 
              </a>
                <ul class="collapse nav flex-column ms-1" id="submenuMonitores" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('monitors.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li> 
                  <li class="w-100 nav-item">
                    <a href="{{ route('monitors.create') }}"class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-person-circle-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>                                          
                </ul>                
            </li>

            <!--Usuarios-->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuUsuarios" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-users-gear me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Usuarios')}}</span>
              </a>
                  <ul class="collapse nav flex-column ms-1" id="submenuUsuarios" data-bs-parent="#menu">
                    <li class="w-100 nav-item">
                      <a href="{{ route('users.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                        <i class="fa-solid fa-list-ul me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                      </a>
                    </li>
                    <li class="w-100 nav-item">
                      <a href="{{ route('users.create') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                        <i class="fa-solid fa-plus me-2"></i>
                        <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                      </a>
                    </li>                  
                  </ul> 
            </li>


            <!-- Post General -->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuPosts" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                  <!-- <i class="fa-regular fa-calendar-days me-2"></i> -->
                <i class="fa-solid fa-file-lines me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Posts-Noticias-Avisos')}}</span> 
              </a>
                <ul class="collapse nav flex-column ms-1" id="submenuPosts" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>
                  <li class="w-100 nav-item">
                    <a href="{{ route('posts.create') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li> 
                </ul>                
            </li>

            <!-- Abris Plazos + Noticias Inscripciones Preinscripciones -->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuPostsAbrir" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-lock-open me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Abrir Plazos')}}</span> 
              </a>
              <ul class="collapse nav flex-column ms-1" id="submenuPostsAbrir" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('posts.abrirPlazos.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-file-circle-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Post Abrir Plazos')}}</span>
                    </a>
                  </li>   
                  <li class="w-100 nav-item">
                    <a href="{{ route('plazos.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-key me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Abrir Plazos')}}</span>
                    </a>
                  </li>            
                </ul>               
            </li>

            <!--Cerrar Plazos-->
            <!-- Cerrar Plazos-> Noticias Inscripciones Preinscripciones -->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuCerrar" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-lock me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Cerrar Plazos')}}</span> 
              </a>
                <ul class="collapse nav flex-column ms-1" id="submenuCerrar" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('posts.cerrarPlazos.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-file-circle-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Post Cerrar Plazos')}}</span>
                    </a>
                  </li>
                  <li class="w-100 nav-item">
                    <a href="{{ route('plazos.index') }} " class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-key me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Cerrar Plazos')}}</span>
                    </a>
                  </li>              
                </ul>               
            </li>
            <!-- Fin Menu Admin y SuperAdmin-->       
          @endhasrole


          @role('Super_Admin')
            <!-- Menu Super Admin Roles y Permisos -->
            <hr>
            <!-- Permisos-->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuPermisos" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-hand me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Permisos')}}</span> 
              </a>
                <ul class="collapse nav flex-column ms-1" id="submenuPermisos" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>   
                  <li class="w-100 nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>            
                </ul>               
            </li>

            <!-- Roles-->
            <li class="nav-item fs-5 w-100">
              <a href="#submenuRoles" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-users-rectangle me-2"></i>
                <span class="d-none d-sm-inline">{{ __('Roles')}}</span> 
              </a>
                <ul class="collapse nav flex-column ms-1" id="submenuRoles" data-bs-parent="#menu">
                  <li class="w-100 nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-list-ul me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Listar')}}</span>
                    </a>
                  </li>   
                  <li class="w-100 nav-item">
                    <a href="{{ route('roles.create') }}" class="nav-link px-0 text-white ms-2 fs-6"> 
                      <i class="fa-solid fa-plus me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Añadir')}}</span>
                    </a>
                  </li>            
                </ul>               
            </li>
            <!-- Fin Menu SuperAdmin--> 
          @endrole
            

            <!-- Común All Roles-->           
            <hr>
            <li class="nav-item fs-5 w-100">
              <a href="{{ route('users.ajustes') }}" class="nav-link align-middle px-0 text-white">
                <i class="fa-solid fa-gear me-2"></i>
                <span class="d-none d-sm-inline">{{__('Ajustes')}}</span>
              </a>
            </li>

            <form action="{{ route('logout') }}" method="post">
              @csrf
              
              <button class="btn ms-0 ps-0" type="submit">
                  <li class="nav-item fs-5 w-100 text-white">
                    <div>
                      <span class="nav-link align-middle px-0"></span>
                      <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                      <span class="d-none d-sm-inline">{{ __('Desconectar')}}</span>
                    </div>
                  </li>
              </button>

            </form>
            <!-- Fin Común All Roles-->        
      </ul>

   </div> 

</div> 
<!-- Fin Navbar vertical-->
