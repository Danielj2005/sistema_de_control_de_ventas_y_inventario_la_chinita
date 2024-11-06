// función para buscar datos de un proveedor ya registrado

function buscar_datos_cliente(){
    let nacionalidad = document.getElementById("nacionalidad").value;
    let cedula = document.getElementById("cedula").value;

    if (cedula =="") {
        swal("Atención!","El campo cédula se encuentra vacío, por favor llena todos los capos para poder continuar","warning");
    }

    let parametros = {
        "buscar": "1",
        "cedula" : nacionalidad+cedula
    };

    $.ajax({
        data:  parametros,
        url:   '../include/buscar_datos_cliente_include.php',
        type:  'post',
        dataType: 'json',
        success: function (datos) {
            if (datos.existe==1) {
                $("#id_cliente").val(datos.id_cliente);
                $("#nombre_cliente").val(datos.nombre);
                $("#telefono_cliente").val(datos.telefono);
            }else{
                swal("Atención!","No se encontro un cliente registrado con esa cédula, por favor llena todos los capos para poder continuar","warning");
            }
        }
    });
}
