// funcion de consulta de detalles
let btn = document.querySelectorAll('.detalles_generales');

btn.forEach((boton) => {
    boton.addEventListener('click', (e) => {
        e.preventDefault();
        let parametros = {
            'modulo': boton.getAttribute("modulo"),
            'id': boton.value,
        };
        if(parametros['id'] !==  ""){
            $.ajax({
                data: parametros,
                url: "../include/detalles_venta.php",
                type: "post",
                success:function(valores){ 
                    $('.modal-body').html(valores);
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
    });
    
});