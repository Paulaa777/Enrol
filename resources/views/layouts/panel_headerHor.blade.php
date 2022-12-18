<!-- navbar header app -->
<header class="fixed-top ms-1 me-3 my-1 head rounded-2 shadow-sm">
 
  <nav class="container-fluid navbar navbar-expand-lg my-3">
    
      <div>
        <a class="navbar-brand" href="/">      
          <img class="img-logo ms-2" src={{ asset('/img/logoEnrol.png') }} alt="Logo Enrol" witdh="211,75" height="75,95">
        </a>
      </div>  
      
      <!-- Usuario dropdown menu -->

        <div class="container-fluid justify-content-end me-3">
        <div class="dropdown justify-content-center me-3">
          <span class="d-flex align-items-center text-decoration-none dropdown-toggle" id="#dropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-circle-user fs-4 navLink"> </i>
          </span>
         
          <ul class="dropdown-menu dropdown-menu-dark mx-0" aria-labelledby="dropdownMenu">
              <li><a class="dropdown-item text-white mx-auto" href="{{ route('users.profile.show', Auth::user()->id) }}">Perfil</a></li>
              <li><a class="dropdown-item text-white mx-auto" href="{{ route('users.profile.edit', Auth::user()->id) }}">Editar</a></li>
              <li><a class="dropdown-item text-white mx-auto" href="{{ route('users.profilePassword.edit', Auth::user()->id) }}">Password</a></li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              
              <form action="{{ route('logout') }}" method="post">
              @csrf
                <button class="btn ms-0 ps-0" type="submit">
                  <li><a class="dropdown-item text-white mx-auto">Log Out</a></li>
                </button>
              </form> 
          </ul>
         
        </div>
        </div>

       
    </nav>
  
</header>
<!-- fin navbar header app -->