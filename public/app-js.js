let yearFoot = new Date();

/* Validar NIF -> expresión regular que permita só 8 números, un guión e unha letra -> válidas
(TRWAGMYFPDXBNJZSQVHLCKE), NIE letra (X, Y, Z), 7 números y dígito de control*/
//const patronNIF = /^[0-9]{8}\-[TRWAGMYFPDXBNJZSQVHLCKE]{1}$/i;
const patronNIF_NIE=/(^[0-9]{8}\-?[TRWAGMYFPDXBNJZSQVHLCKE]{1}$)|(^[XYZ]{1}[0-9]{7}\-?[{1}TRWAGMYFPDXBNJZSQVHLCKE]$)/i;
/* Validar TELEFONO ->expresión regular, debe permitir 9 díxitos obrigatorios*/
const patronTelf = /^[1-9]{1}[0-9]{8}$/;
/*. Validar E-MAIL -> expresión regular que permita comprobar que o e-mail segue un formato correcto*/
const patronMail = /^[a-z0-9\.\_\-]+\@{1}[a-z0-9\.\_\-]+\.{1}[a-z]{2,3}$/i;

/*regex*/
let email;


/*document ready */
$(function () {


    //console.log(yearFoot.getFullYear());
    $("#yearFooter").text(yearFoot.getFullYear());

    //Confirmación Eliminación 
    $(".delete").submit(function () {
        return confirm("Confirma la Eliminación ?");
    });


    //Confirmación Eliminación Cuenta
    $(".deleteUser").submit(function () {
        return confirm("Confirma la Eliminación de su Cuenta ?");
    });

    //Confirmación Baja Actividad

    $(".bajaActividad").submit(function () {
        return confirm("Confirma darse de Baja de esta Actividad ?");
    });

    /*Plaza Obtenida checkbox all SI*/
    
    $('[name="all_plaza_obtenida"]').on('click', function() {

        if($(this).is(':checked')) {
            $.each($('.plaza_obtenida'), function() {
                $(this).prop('checked',true);
            });
        } else {
            $.each($('.plaza_obtenida'), function() {
                $(this).prop('checked',false);
            });
        }
            
    });
 
    /*Permisos Asignar checkobox all SI */
    $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }
            
    });
    

    $("#tipo").change(function() {

        let tipo= $("#tipo").val(); 
        console.log(tipo);

        
        $.get( '/actividades/all', function($data){

           // alert('ok');
            console.log($data);
        });
       
    });
    
 
    
   


});



/*
$(document).ready(function () {

    $("#tipo").change(
         function () {
             alert("Textbox value is changed");
         }
     );
});
*/