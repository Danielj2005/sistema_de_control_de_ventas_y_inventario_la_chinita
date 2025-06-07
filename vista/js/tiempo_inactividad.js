
function detectar_activadad() {
    let tiempo_id; // Almacena el ID del temporizador de inactividad
    let advertencia_tiempo_id; // Almacena el ID del temporizador de advertencia

    function resetear_temporizador() {
        clearTimeout(tiempo_id);
        clearTimeout(advertencia_tiempo_id); // Limpia también el temporizador de advertencia si existía
        tiempo_id = setTimeout( mostrar_advertencia, tiempo_config);
    }

    function mostrar_advertencia() {
        const tiempo_advertencia = 30000;
		swal({
            title: '¡Estás inactivo!',
            text: `Tu sesión se cerrará automáticamente en ${tiempo_advertencia / 1000} segundos debido a la inactividad.`,
            type: 'warning',
			showCancelButton: true,
			confirmButtonText: "Seguir aquí!",
            showCancelButton: true,
			animation: "slide-from-top",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cerrar sesión ahora',
            allowOutsideClick: false,
            allowEscapeKey: false, 
            timer: tiempo_advertencia, 
        },
            function (isConfirm) {
                if (isConfirm) {
                    resetear_temporizador();
                } else {
                    window.location.href = "../include/bitacora_tiempo_inactividad.php"; 
                }
            }
        );
    }

    // Eventos que reinician el temporizador de inactividad
    const events = ['mousemove', 'mousedown', 'keypress', 'scroll', 'touchstart'];
    events.forEach(event => {
        document.addEventListener(event, resetear_temporizador);
    });
    // Inicia el temporizador cuando se carga la página
    resetear_temporizador();
}

document.addEventListener('DOMContentLoaded', () => {
    detectar_activadad(); 
});