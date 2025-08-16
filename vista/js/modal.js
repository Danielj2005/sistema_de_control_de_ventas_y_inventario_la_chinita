
/*-------  Funcion para Mostrar ventana Modal modificar usuario  ------- */
const btn_modal = document.querySelectorAll('.btn_modal');
const contenedor = document.getElementById('body_modal');
const titulo_modal = document.getElementById('exampleModalLabel');
const btn_guardar_modal = document.getElementById('btn_guardar_modal');

// se limpia el contenido del modal antes de abrirlo
contenedor.textContent  = '';

setTimeout(() => {
    btn_modal.forEach((btn_update)=>{
        btn_update.addEventListener('click', (e) =>{
            e.preventDefault();
            
            let id = (btn_update.getAttribute('value') !== "") ? btn_update.getAttribute('value') : '';
            let modal = btn_update.getAttribute('modal');
            let url = btn_update.getAttribute('url');
            let	parametros = {'id' : id  };

            const idTableForDataTable = {
                'ver_categorias' : 'tableCategoryOfProducts',
                'ver_marcas' : 'tableTrademarkOfProducts',
                'ver_presentaciones' : 'tablePresentationOfProducts',
                'ver_historial_proveedor' : 'tableProvider'
            }

            const tamano_modal = document.getElementById('modal_tamano');

            const title_modal = {
                "ver_detalles_bitacora": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del registro en bitácora',
                
                "ver_detalles_proveedor": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del proveedor',
                "modificar_proveedor": '<i class="bi bi-person-plus"></i> &nbsp; Modificar información del proveedor',
                "ver_historial_proveedor": '<i class="bi bi-cart-check"></i> &nbsp; Historial de compras al proveedor',
                "ver_reportes": '<i class="bi bi-file-text "></i> &nbsp; Exportar reporte de compras',
                
                "datos_usuario": '<i class="bi bi-person-circle"></i> &nbsp; Actualizar datos de la cuenta del usuario',
                "modificar_info_personal_usuario": '<i class="bi bi-person-plus"></i> &nbsp; Actualizar información personal',
                "preguntas_seguridad": '<i class="bi bi-shield-plus"></i> &nbsp; Actualizar preguntas de seguridad del usuario',
                
                "modificar_cliente": '<i class="bi bi-person-plus"></i> &nbsp; Modificar cliente',
                "ver_historial_cliente": '<i class="bi bi-cart-check"></i> &nbsp; Historial de compras del cliente',
                
                "modificar_empleado": '<i class="bi bi-person-plus"></i> &nbsp; Modificar características de acceso del usuario',
    
                "ver_detalles_rol" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de permisos de acceso de un rol',
                "modificar_rol" : '<i class="bi bi-person-lines-fill"></i> &nbsp; Modificar permisos de acceso de un rol',
    
                "registrar_producto" : '<i class="bi bi-box-seam"></i> &nbsp; Añadir Nuevo Producto',
                "ver_detalles_entrada" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la entrada',
                "ver_marcas" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de marcas registradas',
                "ver_categorias" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de categorías registradas',
                "ver_presentaciones" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de presentaciones registradas',
                "ver_productos" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Lista de Productos registrados',
                
                "ver_detalles_servicio" : '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles del servicio',
                "modificar_servicio": '<i class="bi bi-person-plus"></i> &nbsp; Modificar servicio',
    
                "ver_detalles_venta_del_dia": '<i class="bi bi-list-columns-reverse"></i> &nbsp; Detalles de la Venta',
            };
            
            const modalXl = [
                'ver_historial_proveedor',
                'ver_historial_cliente',
                'modificar_empleado',
                'ver_detalles_rol',
                'modificar_rol',
                'ver_detalles_entrada',
                'ver_marcas',
                'ver_categorias',
                'ver_presentaciones',
                'ver_productos',
                'ver_detalles_servicio',
                'modificar_servicio'
            ];

            modalXl.includes(`${modal}`) ? tamano_modal.classList.add('modal-xl') : tamano_modal.classList.remove('modal-xl');

            const SendForm = [
                'modificar',
                'ver_categorias',
                'registrar_producto',
                'ver_presentaciones',
                'ver_marcas',
                'modificar_proveedor',
                'modificar_info_personal_usuario',
                'preguntas_seguridad',
                'modificar_cliente',
                'modificar_empleado',
                'modificar_rol',
                'modificar_servicio',
                '',
            ];

            $.ajax({
                data:  parametros,
                url:  url,
                type:  'post',
                success:function(valores){
    
                    titulo_modal.innerHTML = title_modal[`${modal}`]; // se inserta el titulo del modal
                        
                    contenedor.innerHTML = valores; // se inserta el resultado de la busqueda al modal
                    
                    // se evalúa si el modal incluye 'ver' para quitar el boton 'guardar en el modal
                    modal.includes('ver') ? dataTable(`${idTableForDataTable[modal]}`) : '';
                    // se evalúa si el modal incluye 'ver' para quitar el boton 'guardar en el modal
                    modal.includes('ver') ? btn_guardar_modal.classList.add('d-none') : btn_guardar_modal.classList.remove('d-none');
                    // se ajusta el tamaño del modal en base a los datos a mostrar
                    
                    // se evalúa si el modal incluye 'modificar' para llamarr a la funcion 'SendFormAjax()' para el envio de formularios en el modal
                    SendForm.includes(`${modal}`) ? SendFormAjax() : '';

                    // se evalúa si el modal incluye 'modificar' para asignar el atributo 'form' al boton 'guardar' en el modal y asociarlo a su respectivo formulario
                    modal.includes('modificar') ? btn_guardar_modal.setAttribute('form','SendForm') : '';
                    modal.includes('modificar_servicio') ? btn_selectores_in_modal() : '';
                    modal.includes('registrar_producto') ? btn_guardar_modal.setAttribute('form','SendForm') : '';
                    
                    // se evalúa si el modal incluye 'modificar_rol' para ejecutar la funcion 'evaluar_casillas()' para la seleccion de roles en el modal
                    modal === 'modificar_rol' ? evaluar_casillas() : '';
                },
                error: function(){
                    $('.msjFormSend').html(valores); // se inserta el resultado de la busqueda al modal
                }
            });
        });
    });
}, 2000);