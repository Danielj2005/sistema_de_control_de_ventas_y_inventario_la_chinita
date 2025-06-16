// función para buscar datos de un proveedor ya registrado

function buscar_proveedor(){
    let nacionalidad = document.getElementById('nacionalidad').value;
    let cedula = document.getElementById("cedula").value;

    if (cedula =="") {
        Swal.fire("Atención!","El campo cédula se encuentra vacío, Por favor llenar todos los campos para continuar","warning");
    }
    
    let parametros = {
        "buscar": "1",
        "cedula" : nacionalidad+cedula
    };

    $.ajax({
        data:  parametros,
        url:   '../include/buscar_proveedor.php',
        type:  'post',
        dataType: 'json',
        success: function (datos) {
            if (datos.existe == 1) {
                $("#nombre_proveedor").val(datos.nombre);
                $("#telefono").val(datos.telefono);
                $("#correo").val(datos.correo);
                $("#direccion").val(datos.direccion);
            }
            if (datos.existe == 0) {
                Swal.fire("Atención!","No se encontró ningún proveedor registrado con ese documento de identidad, por favor, verifica he intenta nuevamente","warning");
            }
        },
        error: function () {
            Swal.fire("Atención!","Ha ocurrido un error al procesar tu solicitud, por favor, recargue la página y intenta nuevamente","warning");
        }
    });
}
