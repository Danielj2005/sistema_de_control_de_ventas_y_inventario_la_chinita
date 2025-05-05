const btn_enviar = document.getElementById('enviar');

btn_enviar.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default form submission behavior
    let correo = document.getElementById('correo_recuperar_contraseña').value;

    // Check for empty fields
    if(correo === "" || correo === "" ){
        swal({
            title: "¡Ocurrio un error!",
            text: "Exite un campo obligatorio que esta vacío.",
            type: "error",
            confirmButtonText: "Aceptar" // Fix: typo in confirmBottonText
        });
        return; // Exit the function if fields are empty
    }

    let parametros = { 
        'modulo': "recuperar_contraseña",
        'correo_recuperar_contraseña': correo,
        'acceso_recuperar_contraseña' : "ecDAuKiplp8="
    };

    // AJAX request to send new password
    $.ajax({
        data: parametros,
        url: "./vista/recuperar_contraseña.php",
        type: "post",
        dataType: "json",
        success:function(valores){
            
            console.log(valores.usuario_bloqueado);

            if (valores.usuario_bloqueado == 1) {
                swal({
                    title: "¡Cuenta bloqueada!",
                    text: "Su cuenta ha sido bloqueada debido a tres intentos fallidos de inicio de sesión, por favor contacte al administrador del sistema para restablecer el acceso.",
                    type: "warning",
                    confirmButtonText: "Aceptar"
                });
            } else {
                window.location.href = "./vista/recuperar_contraseña.php";
            }
	
        },
        error: function(valores) {
            swal({
                title: "¡Ocurrio un error!",
                text: "Hubo un problema al enviar la solicitud. Por favor, intenta nuevamente.",
                type: "error",
                confirmButtonText: "Aceptar"
            });
        }
    });
});