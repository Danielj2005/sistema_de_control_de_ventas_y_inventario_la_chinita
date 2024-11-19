// función para buscar datos de un proveedor ya registrado

function buscar_proveedor(){
    let nacionalidad = document.getElementById('nacionalidad').value;
    let cedula = document.getElementById("cedula").value;

    if (cedula =="") {
        swal("Atención!","El campo cédula se encuentra vacío, Por favor llenar todos los campos para continuar","warning");
    }
    
    let parametros = {
        "buscar": "1",
        "cedula" : nacionalidad+cedula
    };

    $.ajax({
        data:  parametros,
        url:   '../controlador/buscar_proveedor.php',
        type:  'post',
        dataType: 'json',
        success: function (datos) {
            if (datos.existe==1) {
                $("#nombre_proveedor").val(datos.nombre);
                $("#telefono").val(datos.telefono);
                $("#correo").val(datos.correo);
                $("#direccion").val(datos.direccion);
            }
        }
    });
}
