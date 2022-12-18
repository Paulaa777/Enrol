@extends('layouts.app_layout')

@section('contenido')

<div class="container-fluid my-5">

    <div class="container py-3 mb-3">
        <h2 class="text-center mb-3">{{__('Preguntas Frecuentes')}}</h2>
    </div>

    <div class="container py-2 w-75">
        
        <div class="accordion" id="accordion1">
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                  1
                </button>
              </h2>
              <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec lectus vitae ante pellentesque egestas. Suspendisse a purus eget leo luctus rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam nec nunc mauris. Etiam et sagittis nulla. Donec et sem mollis, volutpat massa a, lobortis diam.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="heading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                  2
                </button>
              </h2>
              <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion1">
                <div class="accordion-body">
                    <p>Nulla efficitur lorem nec sem malesuada varius. Nam tristique justo vel scelerisque elementum. Maecenas consequat lobortis augue. Nam gravida imperdiet tellus, in suscipit lacus placerat nec. Morbi tristique finibus nisl at suscipit. Nullam placerat eu nisi id semper. </p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="heading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  3
                </button>
              </h2>
              <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion1">
                <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra felis a justo viverra, vitae gravida augue imperdiet. Nullam rhoncus odio in libero varius, at ornare libero egestas. In et malesuada dolor, eu sollicitudin ipsum. Praesent vitae leo pharetra, dapibus sapien quis, commodo diam</p>
                </div>
              </div>
            </div>
          </div>
    
    </div>

</div>

@endsection