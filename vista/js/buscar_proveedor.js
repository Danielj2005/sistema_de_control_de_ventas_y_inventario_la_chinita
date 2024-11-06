// función para buscar datos de un proveedor ya registrado

function buscar_proveedor(){

    cedula = document.getElementById("cedula").value;

    if (cedula =="") {
        swal("Atención!","EL CAMPO CÉDULA DE ENCUENTRA VACÍO, POR FAVOR LLENAR TODOS LOS CAMPOS PARA PODER CONTINUAR","warning");
    }

    let parametros = {
        "buscar": "1",
        "cedula" : cedula
    };

    $.ajax({
        data:  parametros,
        url:   '../controlador/buscar_proveedor.php',
        type:  'post',
        success: function (datos) {
            let datosObj = $.parseJSON(datos);
            if (datosObj.existe==1) {
                $("#nombre_proveedor").val(datosObj.nombre);
                $("#telefono").val(datosObj.telefono);
                $("#correo").val(datosObj.correo);
                $("#direccion").val(datosObj.direccion);
            }
        }
    });
}
