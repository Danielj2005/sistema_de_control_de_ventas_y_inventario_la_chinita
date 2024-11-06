/*---- funcion para enviar la respuesta a las preguntas secretas ------*/
function enviar_respuestas_recuperar_contraseña() {

    let parametros = {
        'modulo': "verificar_preguntas",
        'id_usuario': document.getElementById('id_usuario').value,
        'respuesta_seguridad': document.getElementById('respuesta_seguridad').value,
        'numero_pregunta': document.getElementById('numero_pregunta').value
    };
    if(parametros['respuesta_seguridad'] !==  ""){
        $.ajax({
            data: parametros,
            url: "../controlador/recuperar_contraseña.php",
            type: "post",
            success:function(valores){ 
                $('.msjFormSend').html(valores);
            }
        });
    }else{
        swal({
            title: "¡Ocurrio un error!",
            text: "El campo de RESPUESTA se encuentra vacío.",
            type: "error",
            confirmBottonText: "Aceptar"
        });
    } 
    
}

// /* -----funcion para enviar contraseña nueva ----------- */
// function enviar_contraseña_nueva(){
//     let parametros = {
//         'modulo': "cambiar_contraseña",
//         'nueva_contraseña': document.getElementById('nueva_contraseña').value,
//         'repite_nueva_contraseña2': document.getElementById('repite_nueva_contraseña2').value
//     };

//     if(parametros['nueva_contraseña'] == "" || parametros['repite_nueva_contraseña2'] == "" ){
//         swal({
//             title: "¡Ocurrio un error!",
//             text: "Exiten Campos obligatorios Que Estan Vacíos",
//             type: "error",
//             confirmBottonText: "Aceptar"
//         });
//     }

//     if(parametros['nueva_contraseña'] !== parametros['repite_nueva_contraseña2']){
//         swal({
//             title: "¡Ocurrio un error!",
//             text: "Las contraseñas que ingresaste no coinciden. Por favor, verifica que las hayas escrito correctamente.",
//             type: "error",
//             confirmBottonText: "Aceptar"
//         });
//     }else{
//         $.ajax({
//             data: parametros,
//             url: "../controlador/recuperar_contraseña.php",
//             type: "post",
//             success:function(valores){
//                 $('.msjFormSend').html(valores);
//             }
//         });
//     }
// }


/* -----funcion para enviar contraseña nueva ----------- */
function enviar_contraseña_nueva(){
    let parametros = {
        'modulo': "cambiar_contraseña",
        'nueva_contraseña': document.getElementById('nueva_contraseña').value,
        'repite_nueva_contraseña2': document.getElementById('repite_nueva_contraseña2').value
    };

    // Check for empty fields
    if(parametros['nueva_contraseña'] === "" || parametros['repite_nueva_contraseña2'] === "" ){
        swal({
            title: "¡Ocurrio un error!",
            text: "Exiten Campos obligatorios Que Estan Vacíos",
            type: "error",
            confirmButtonText: "Aceptar" // Fix: typo in confirmBottonText
        });
    } else if(parametros['nueva_contraseña'] !== parametros['repite_nueva_contraseña2']){
        swal({
            title: "¡Ocurrio un error!",
            text: "Las contraseñas que ingresaste no coinciden. Por favor, verifica que las hayas escrito correctamente.",
            type: "error",
            confirmButtonText: "Aceptar" // Fix: typo in confirmBottonText
        });
    } else {
        $.ajax({
            data: parametros,
            url: "../controlador/recuperar_contraseña.php",
            type: "post",
            success: function(valores){
                $('.msjFormSend').html(valores);
            }
        });
    }
}