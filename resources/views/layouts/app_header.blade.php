<!-- navbar header app -->
<header class="head fixed-top pb-2 shadow-sm">
 

  <nav class="container-fluid navbar navbar-expand-lg">
    
      <div>
        <a class="navbar-brand" href="/">      
          <img class="img-logo" src={{ asset('/img/logoEnrol.png') }} alt="Logo Enrol" witdh="211,75" height="75,95">
        </a>
      </div> 

       
      <button class="navbar-toggler mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon fs-3"></span>
      </button>
        
      <div class="collapse navbar-collapse p-2 mt-2 justify-content-end" id="collapsibleNavbar">
        
        <ul class="navbar-nav mt-2">

          @guest

            <li class="nav-item">                
              <a class="nav-link" href="/">
                <div class="enlaceH">
                  <i class="fa fa-home fs-5"></i>
                    Inicio
                </div>
              </a>
            </li>
        
   
          @if (Route::has('login'))
            <li class="nav-item">                
              <a class="nav-link" href="{{ route('login') }}">
                <div class="enlaceH">
                  <i class="fa fa-user fs-5"></i>
                  {{ __('Acceso') }}
                </div>
              </a>
            </li>
          @endif  
      
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                <div class="enlaceH ">
                  <i class="fa-solid fa-file-pen fs-5"></i>
                    {{ __('Registro') }}
                </div>
              </a>
            </li>
          @endif

          @else

           <li class="nav-item dropdown me-5">
              <a id="#navbarDropdown" class="nav-link dropdown-toggle" href="{{route('login') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->nombre }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               
                    <a class="dropdown-item enlaceH" href="{{route('login') }}"> {{ __('Perfil') }} </a>
                  
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn ms-0 ps-0" type="submit">                
                          <a class="dropdown-item enlaceH">  {{ __('Logout') }} </a>
                        </button>
                    </form>               
              
              </div>
            </li> 
          
          
          @endguest   

        </ul>

      </div>

 
  </nav> 


</header>

<!-- fin navbar header app -->