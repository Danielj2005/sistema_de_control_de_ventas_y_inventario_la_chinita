$(document).ready(function(){
    /*------- funcion de el boton para salir del sistema -------*/
    $('.btn-exit-system').on('click', function(e){
        e.preventDefault();

        // Llamar a un archivo PHP para destruir las variables de sesión
        swal({
            title: 'Estas Seguro(a)?',
            text: "Se cerrará la sesión",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: ' Sí, Salir!',
            cancelButtonText: ' No, Cancelar!'
        },
        function (isComfirm) {
            if (isComfirm) {
                $.ajax({
                    url:   "../controlador/salir.php",
                    type:  'post',
                    success:  function (){
                        window.location.href="../index.php";
                    }
                });
            }
        });
    });

});