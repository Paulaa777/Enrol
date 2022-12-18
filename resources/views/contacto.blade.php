@extends('layouts.app_layout')

@section('contenido')

<div class="container-fluid py-3">

    <div class="container py-3 mt-5 border-bottom">
        <h2 class="text-center">Contacto</h2>
    </div>

        
    <p class="mt-5 pt-3 text-secondary text-center">Envíenos sus comentarios a través del siguiente formulario, le reponderemos lo antes posible</p>
    
    
    <div class ="row justify-content-center py-5 w-75 mx-auto">
    
        <div class ="col py-3 border border-3 rounded-4 border-3 form-background">

            <form class="needs-validation" action="" method="">

                @csrf

                <div class="form-floating my-3">
                    <input type="text" class="form-control" placeholder="nombre" id="nombre" required>
                    <label for="nombre">Nombre</label>
                    
                    <div class="invalid-feedback">
                        Por favor añada su nombre
                    </div>                
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="apellido" id="apellido" required>
                    <label for="apellido">Apellido</label>

                    <div class="invalid-feedback">
                        Por favor añada su Apellido
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email" required>
                    <label for="email">Email</label>
                
                    <div class="invalid-feedback">
                        Por favor añada su Email
                    </div>
                </div>
                
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="comentarios" id="comentarios" style="height: 100px" required></textarea>
                    <label for="comentarios">Comentarios</label>
                
                    <div class="invalid-feedback">
                        Por favor añada sus Comentarios
                    </div>
                </div>

                <div class="text-center mt-4 mb-3">
                <button class="boton-envio rounded-3 px-3 py-2" type="submit">Enviar</button>
                </div>
                
            </form>

        </div>
    
    </div>

</div>

@endsection