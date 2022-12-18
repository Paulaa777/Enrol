<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Enrol Dashboard</title>
        <!-- @section('tittle', 'Enrol') -->
             
       

        <!-- Estilos -->
        <link rel="stylesheet" href={{ asset('estilos.css')}} >
        
        <!--Boostrap- -> CSS + JS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
  	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
      
        <!--Fontawasome 6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--Google Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        
         <!--JQuery-->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        
        <!--JavaScript-->
        <script src={{ asset('app-js.js')}}></script>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body >
      
        
         
         <!-- Nabvar horizontal -->
         @include('layouts.panel_headerHor')

         <main class="container-fluid py-2 mt-5">
            
            <div class="row flex-nowrap mt-5 me-0"> 
                   
                <!-- Nabvar Vertical-->
                @include('layouts.panel_headerVer')

                <!-- content -->                   
                @yield('contenido-panel')                               
                                     
            </div>

         </main>

         @include('layouts.panel_footer')

        
        
         
    </body>
</html>
