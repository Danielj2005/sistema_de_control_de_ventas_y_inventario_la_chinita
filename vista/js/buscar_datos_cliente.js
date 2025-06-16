// función para buscar datos de un proveedor ya registrado

function buscar_datos_cliente(){
    let nacionalidad = document.getElementById("nacionalidad").value;
    let cedula = document.getElementById("cedula").value;
    
    let input_id_cliente = $("#id_cliente");
    let input_cedula = $("#cedula");
    let input_nombre = $("#nombre");
    let input_telefono = $("#telefono");

    let mensaje_cedula = $("#mensaje_cedula");
    let mensaje_nombre = $("#mensaje_nombre");
    let mensaje_telefono = $("#mensaje_telefono");

    if (cedula == "") {
        Swal.fire("Atención!","El campo cédula se encuentra vacío, por favor asegurate de haber escrito una cédula válida antes de poder continuar","warning");
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
                    
                    input_id_cliente.val(datos.id_cliente);
                    input_nombre.val(datos.nombre);
                    input_telefono.val(datos.telefono);

                    mensaje_cedula.hasClass('d-none') ? '' : mensaje_cedula.addClass('d-none');
                    mensaje_nombre.hasClass('d-none') ? '' : mensaje_nombre.addClass('d-none');
                    mensaje_telefono.hasClass('d-none') ? '' : mensaje_telefono.addClass('d-none');

                    input_cedula.hasClass('invalid') ? input_cedula.removeClass('invalid') && input_cedula.addClass('valid') : input_cedula.addClass('valid');
                    input_nombre.hasClass('invalid') ? input_nombre.removeClass('invalid') && input_nombre.addClass('valid') : input_nombre.addClass('valid');
                    input_telefono.hasClass('invalid') ? input_telefono.removeClass('invalid') && input_telefono.addClass('valid') : input_telefono.addClass('valid');
                }else{
                    Swal.fire("Atención!","No se encontro un cliente registrado con esa cédula, por favor llenar todos los capos para poder continuar","warning");
                    // se limpian los campos de la información del cliente
                    document.querySelectorAll('#datos_cliente input').forEach((input) => {input.value = ''}); 
                    // se cambian los colores de los campos de la información del cliente
                    input_cedula.hasClass('invalid') ? input_cedula.removeClass('invalid') : input_cedula.removeClass('valid');
                    input_nombre.hasClass('invalid') ? input_nombre.removeClass('invalid') : input_nombre.removeClass('valid');
                    input_telefono.hasClass('invalid') ? input_telefono.removeClass('invalid') : input_telefono.removeClass('valid');
                }
            }
        });
    }

}