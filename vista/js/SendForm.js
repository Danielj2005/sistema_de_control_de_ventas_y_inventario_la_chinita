$(document).ready(function(){
    var MsjErrorSending='<div class="responseProcess text-white"><div class="container-loader"><div class="loader"><i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i></div><p class="text-center lead text-white">Ocurrio un problema, recargue la página e intente nuevamente o presione F5</p></div></div>';
    var MsjSending='<div class="responseProcess text-white"><div class="container-loader"><div class="loader"><svg class="circular"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div><p class="text-center lead text-white">Procesando... Un momento por favor</p></div></div>';
    $('.SendFormAjax').submit(function(e) {
        e.preventDefault();
        var informacion = $(this).serialize();
        var metodo = $(this).attr('method');
        var peticion = $(this).attr('action');
        var type_form = $(this).attr('data-type-form');
        if(type_form === "load"){
            $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $('.msjFormSend').html(MsjSending);
                },
                error: function() {
                    $('.msjFormSend').html(MsjErrorSending);
                },
                success: function (data) {
                    $('.msjFormSend').html(data);
                }
            });
            return false;
        }else{
            var title_alert;
            var text_alert;
            var type_alert;
            var confirmButtonColor_alert;
            var confirmButtonText_alert;
            var closeAlert;
            if(type_form === "save"){
                title_alert="¿Quieres almacenar los datos?";
                text_alert="Los datos se almacenaran en el sistema";
                type_alert="info";
                confirmButtonColor_alert="#3598D9";
                confirmButtonText_alert="Si, almacenar";
                closeAlert=false;
            }
            if(type_form==="delete"){
                title_alert="¿Quieres eliminar los datos?";
                text_alert="Al eliminar estos datos no podrás recuperarlos después";
                type_alert="warning";
                confirmButtonColor_alert="#C9302C";
                confirmButtonText_alert="Si, eliminar";
                closeAlert=false;
            }
            if(type_form==="update"){
                title_alert="¿Quieres actualizar los datos?";
                text_alert="Los datos se actualizaran y no podras recuperar los datos anteriores";
                type_alert="info";
                confirmButtonColor_alert="#198754";
                confirmButtonText_alert="Si, actualizar";
                closeAlert=false;
            }
            if(type_form==="updateAccounUser"){
                title_alert="¿Quieres realizar el cambio?";
                text_alert="Puedes activar o desactivar la cuenta del usuario en cualquier momento";
                type_alert="info";
                confirmButtonColor_alert="#16a085";
                confirmButtonText_alert="Si, realizar";
                closeAlert=false;
            }
            if(type_form==="updateEstado"){
                title_alert="¿Quieres realizar el cambio?";
                text_alert="El Préstamo será actualizado a devuelto, no puedes deshacer estos cambios";
                type_alert="warning";
                confirmButtonColor_alert="##3800ff";
                confirmButtonText_alert="Si, realizar";
                closeAlert=false;
            }
            swal({
                title: title_alert,   
                text: text_alert,   
                type: type_alert,   
                showCancelButton: true,   
                confirmButtonColor: confirmButtonColor_alert,   
                confirmButtonText: confirmButtonText_alert,
                cancelButtonText: "No, cancelar",
                closeOnConfirm: closeAlert=false,
                animation: "slide-from-top"
            }, function(){
                $.ajax({
                    type: metodo,
                    url: peticion,
                    data:informacion,
                    beforeSend: function(){
                        $('.msjFormSend').html(MsjSending);
                    },
                    error: function() {
                        $('.msjFormSend').html(MsjErrorSending);
                    },
                    success: function (data) {
                        $('.msjFormSend').html(data);
                    }
                });
                return false;
            }); 
        }
    }); 
});