/*---- funcion para enviar la respuesta a las preguntas secretas ------*/
function show_form_password() {
    setTimeout(() => {
        document.getElementById('verificar_respuestas').classList.add('d-none');
        document.getElementById('cambiar_contraseña').classList.remove('d-none');
    }, 3000);
}
