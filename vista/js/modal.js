
/*-------  Funcion para Mostrar ventana Modal modificar usuario  ------- */
const btn_modal = document.querySelectorAll('.btn_modal');
const contenedor = document.getElementById('body_modal');
const titulo_modal = document.getElementById('exampleModalLabel');
const btn_guardar_modal = document.getElementById('btn_guardar_modal');

btn_modal.forEach((btn_update)=>{
    btn_update.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let id = (btn_update.getAttribute('value') !== "") ? btn_update.getAttribute('value') : '';
        let modal = btn_update.getAttribute('modal');
        let url = btn_update.getAttribute('url');
        let	parametros = { 'id' : id  };

        const title_modal = {
            "ver_detalles_bitacora": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del registro en bitácora',
            
            "ver_detalles_proveedor": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del proveedor',
            "modificar_proveedor": '<i class="bi bi-person-plus"></i> &nbsp; Modificar información del proveedor',
            "ver_historial_proveedor": '<i class="bi bi-cart-check"></i> &nbsp; Historial de compras al proveedor',
            
            "datos_usuario": '<i class="bi bi-person-circle"></i> &nbsp; Actualizar datos de la cuenta del usuario',
            "modificar_info_personal_usuario": '<i class="bi bi-person-plus"></i> &nbsp; Actualizar información personal',
            "preguntas_seguridad": '<i class="bi bi-shield-plus"></i> &nbsp; Actualizar preguntas de seguridad del usuario',
            
            "modificar_cliente": '<i class="bi bi-person-plus"></i> &nbsp; Modificar cliente',
            "ver_historial_cliente": '<i class="bi bi-cart-check"></i> &nbsp; Historial de compras del cliente',
            
            "modificar_empleado": '<i class="bi bi-person-plus"></i> &nbsp; Modificar características de acceso del usuario',

            "ver_detalles_rol" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de permisos de acceso de un rol',
            "modificar_rol" : '<i class="bi bi-person-lines-fill"></i> &nbsp; Modificar permisos de acceso de un rol',

        };
        

        $.ajax({
            data:  parametros,
            url:  url,
            type:  'post',
            success:function(valores){

                titulo_modal.innerHTML = title_modal[`${modal}`]; // se inserta el titulo del modal
                    
                contenedor.innerHTML = valores; // se inserta el resultado de la busqueda al modal
                
                // se evalúa si el modal incluye 'ver' para quitar el boton 'guardar en el modal
                modal.includes('ver') === true ? dataTable() : '';
                // se evalúa si el modal incluye 'ver' para quitar el boton 'guardar en el modal
                modal.includes('ver') === true ? btn_guardar_modal.classList.add('d-none') : btn_guardar_modal.classList.remove('d-none');
                
                // se evalúa si el modal incluye 'modificar' para llamarr a la funcion 'SendFormAjax()' para el envio de formularios en el modal
                modal.includes('modificar') === true ? SendFormAjax() : '';
                // se evalúa si el modal incluye 'modificar' para asignar el atributo 'form' al boton 'guardar' en el modal y asociarlo a su respectivo formulario
                modal.includes('modificar') === true ? btn_guardar_modal.setAttribute('form','SendForm') : '';
                
                // se evalúa si el modal incluye 'modificar_rol' para ejecutar la funcion 'evaluar_casillas()' para la seleccion de roles en el modal
                modal === 'modificar_rol' ? evaluar_casillas() : '';

            },
            error: function(){
                $('.msjFormSend').html(valores); // se inserta el resultado de la busqueda al modal
            }
        });
    });
});