// función para buscar datos de un proveedor ya registrado

function buscar_datos_cliente(){
    let nacionalidad = document.getElementById("nacionalidad").value;
    let cedula = document.getElementById("cedula").value;
    
    if (cedula == "") {
        swal("Atención!","El campo cédula se encuentra vacío, por favor asegurate de haber escrito una cédula válida antes de poder continuar","warning");
    }else{

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
                if (datos.existe == 1) {
                    
                    let id_cliente = $("#id_cliente");
                    let cedula = $("#cedula");
                    let nombre = $("#nombre");
                    let telefono = $("#telefono");
                    let mensaje_cedula = $("#mensaje_cedula");
                    let mensaje_nombre = $("#mensaje_nombre");
                    let mensaje_telefono = $("#mensaje_telefono");

                    id_cliente.val(datos.id_cliente);
                    nombre.val(datos.nombre);
                    telefono.val(datos.telefono);

                    mensaje_cedula.hasClass('d-none') ? '' : $("#mensaje_cedula").addClass('d-none');
                    mensaje_nombre.hasClass('d-none') ? '' : $("#mensaje_nombre").addClass('d-none');
                    mensaje_telefono.hasClass('d-none') ? '' : $("#mensaje_telefono").addClass('d-none');

                    cedula.hasClass('invalid') ? cedula.removeClass('invalid') && cedula.addClass('valid') : cedula.addClass('valid');
                    nombre.hasClass('invalid') ? nombre.removeClass('invalid') && nombre.addClass('valid') : nombre.addClass('valid');
                    telefono.hasClass('invalid') ? telefono.removeClass('invalid') && telefono.addClass('valid') : telefono.addClass('valid');
                    

                }else{
                    swal("Atención!","No se encontro un cliente registrado con esa cédula, por favor llenar todos los capos para poder continuar","warning");
                }
            }
        });
    }

}