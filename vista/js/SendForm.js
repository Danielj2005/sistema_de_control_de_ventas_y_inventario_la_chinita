$(document).ready(function () {
    SendFormAjax();
});

function SendFormAjax() {
    var MsjErrorSending = `<div class="responseProcess text-white">
                                <div class="container-loader">
                                    <div class="loader">
                                        <i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
                                    </div>
                                    <p class="text-center lead text-white">Ocurrio un problema, recargue la página e intente nuevamente o presione F5</p>
                                </div>
                            </div>`;

    var MsjSending = `<div class="responseProcess text-white">
                        <div class="container-loader">
                            <div class="loader">
                                <svg class="circular"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg>
                            </div>
                            <p class="text-center lead text-white">Procesando... Un momento por favor</p>
                        </div>
                    </div>`;
    
    var MjProcesando= `<div class="responseProcess text-white bg-dark">
                            <div class="container-loader p-5 d-flex justify-content-center align-items-center">
                                <div class="loader"></div>
                            </div>
                            <p class="text-center lead text-white">Procesando... Un momento por favor</p>
                        </div>`;

    
    $('.SendFormAjax').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this); // Crea un objeto FormData con los datos del formulario

        var metodo = $(this).attr('method');
        var peticion = $(this).attr('action');
        var type_form = $(this).attr('data-type-form');
        var procesando = $(this).attr('procesando');

        if(type_form === "load"){
            // No modification needed for "load" type
            $.ajax({
                type: metodo,
                url: peticion,
                data: formData, // Usa el objeto FormData en lugar de $(this).serialize(),
                processData: false, // Evita que jQuery procese los datos
                contentType: false, // Evita que jQuery establezca el tipo de contenido
                beforeSend: function(){
                    $('.msjFormSend').html(MjProcesando);
                },
                error: function() {
                    $('.msjFormSend').html(MsjErrorSending);
                },
                success: function (data) {
                    $('.msjFormSend').html(data);
                }
            });
            return false;
        } else {
            var title_alert;
            var text_alert;
            var type_alert;
    
            switch (type_form) {
                case "save":
                    title_alert = "¿Quieres almacenar los datos?";
                    text_alert = "Los datos se almacenarán en el sistema";
                    type_alert = "info";
                    break;
                case "delete":
                    title_alert = "¿Quieres eliminar los datos?";
                    text_alert = "Al eliminar estos datos no podrás recuperarlos después";
                    type_alert = "warning";
                    break;
                case "suspender_empresa":
                    title_alert = "¿Confirmación de Suspención?";
                    text_alert = "Al suspender esta empresa ninguno de sus usaurios podran iniciar sesión, desea continuar?";
                    type_alert = "warning";
                    break;
                case "activar_empresa":
                    title_alert = "¿Confirmación de Activación?";
                    text_alert = "Al activar esta empresa sus usaurios podran iniciar sesión, desea continuar?";
                    type_alert = "warning";
                    break;
                case "update":
                    title_alert = "¿Quieres actualizar los datos?";
                    text_alert = "Los datos se actualizarán y no podrás recuperar los datos anteriores";
                    type_alert = "info";
                    break;
                case "verificar":
                    title_alert = "¿Quieres verificar pago?";
                    text_alert = "Los datos se actualizarán y no podrás recuperar los datos anteriores";
                    type_alert = "info";
                    break;
                case "updateAccounUser":
                    title_alert = "¿Quieres realizar el cambio?";
                    text_alert = "Puedes activar o desactivar la cuenta del usuario en cualquier momento";
                    type_alert = "info";
                    break;
                case "updateEstado":
                    title_alert = "¿Quieres realizar el cambio?";
                    text_alert = "Puedes activar o desactivar en cualquier momento";
                    type_alert = "warning";
                    break;
                default:
                    console.error("No se reconoce el tipo de formulario:", type_form);
                    return; // Exit if type_form is not recognized
            }
    
            swal({
                title: title_alert,
                text: text_alert,
                type: type_alert,
                showCancelButton: true,
                confirmButtonColor: "#3085d6", // Default SweetAlert2 blue
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar",
                animation: "slide-from-top"
            },
            function(isConfirm){
                if (isConfirm) {
                    // el usuario confirme la acción
                    $.ajax({
                    type: metodo,
                    url: peticion,
                    data: formData, // Usa el objeto FormData en lugar de $(this).serialize(),
                    processData: false, // Evita que jQuery procese los datos
                    contentType: false, // Evita que jQuery establezca el tipo de contenido
                    error: function () {
                        $('.msjFormSend').html(MsjErrorSending);
                    },
                    process: function (){
                        $('.msjFormSend').html(MjProcesando);
                    }, 
                    success: function (data) {
                        $('.msjFormSend').html(data);
                    }
                    });
                }
            });
        }
    });

}

document.addEventListener("DOMContentLoaded", function() {
    // Selecciona el nodo objetivo para observar (por ejemplo, el body)
    const targetNode = document.body;

    // Opciones de configuración para observar cambios
    const config = { childList: true, subtree: true };

    // Callback que se ejecuta cuando hay mutaciones en el DOM

    const callback = function(mutationsList, observer) {

        for (let mutation of mutationsList) {

            if (mutation.type === 'childList') {

                mutation.addedNodes.forEach(node => {

                    if (node.nodeType === 1) { // Es un elemento HTML

                        // Aquí puedes comprobar si el nodo coincide con lo que buscas, por ejemplo un modal con una clase o id específico

                        if (node.matches('#update_user_info') || node.querySelector('#update_user_info')) {

                            console.log('¡Se detectó un modal insertado en el DOM!', node);
                            SendFormAjax();

                        }

                    }

                });

            }

        }

    };


    // Crea un observer con el callback
    const observer = new MutationObserver(callback);


    // Empieza a observar el nodo con las configuraciones indicadas
    observer.observe(targetNode, config);

    // Si alguna vez quieres dejar de observar:
    // observer.disconnect();

});