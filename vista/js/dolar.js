function obtener_precio_dolar_auto() {
	$.ajax({
        data:  '',
        url:   '../include/obtener_precio_dolar.php',
        type:  'post',
        success: function (datos) {

			// document.querySelector(".msjFormSend").innerHTML = datos;
			document.getElementById('tasa_dolar').innerText = datos;
			guardar_precio_dolar_auto(datos);
        },
        error: function () {
			swal("Ocurrio un error!","Error al obtener el precio del dólar de manera automática, debes actualizar la tasa de manera manual","error");
        }
    });
}
function guardar_precio_dolar_auto(datos) {
	$.ajax({
        data:  { 'priceDolar': datos, 'manera': "automática"  },
        url:   '../controlador/dolar.php',
        type:  'post',
        success: function (datos) {
			swal({
					title:"¡Actualización de la Tasa Exitosa!",
					text:"La tasa se actualizó exitosamente",
					type: "success",
					confirmButtonText: "Aceptar"
				},
				function(isConfirm){
					if (isConfirm) {
						location.reload();
					}else{
						location.reload();
					}
				});
        }, error: function (error) {
			document.querySelector(".msjFormSend").innerHTML = error;
		}
    });
}

const btn_update_dolar_auto = document.querySelector("#btn_update_dolar_auto");
if (btn_update_dolar_auto) {
	btn_update_dolar_auto.addEventListener("click", function(e){
		e.preventDefault();
		obtener_precio_dolar_auto();
	});
}