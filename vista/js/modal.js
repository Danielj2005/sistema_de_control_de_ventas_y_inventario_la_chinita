// var myModal = document.getElementById('myModal')
// var myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', function () {
// myInput.focus()
// });


/*-------  Funcion para Mostrar ventana Modal Actualizar  ------- */

// $(document).ready(function(){
//     $('.open-modal').on('click', function(e){
//         e.preventDefault();
//         let id_proveedor = document.getElementById('id_proveedor');
        
//         // let detalles = $('#Details');
//         // let modal = $('.Modal');


//         // modal.addClass('modal--Show');
//         // modal.addClass('active');
//         // detalles.removeClass('active');

//         let	parametros = {'code' : id_proveedor };

//         $.ajax({
//             data:  parametros,
//             url:  './modal/modificar.php',
//             type:  'post',
//             dataType: 'json',
//             success:function(valores){
//                 if (valores.existe == 1) {
//                     // modificar solicitante
//                     $('#codigo').val(valores.id);
//                     $('#cedula').val(valores.cedula);
//                     $('#nombre').val(valores.nombre);
//                     $('#correo').val(valores.correo);
//                     $('#telefono').val(valores.telefono);
//                     $('#direccion').val(valores.direccion);
//                     // if(tabla == 'proveedor'){

//                         // if(valores.solicitante == 3){
//                         //     document.getElementById('div_descripcion_modificar').classList.remove('d-none');
//                         //     $('.descripcion').val(valores.descripcion);
                            
//                         // }else{
//                         //     document.getElementById('div_descripcion_modificar').classList.add('d-none');
//                         //     document.getElementById('div_tipo_solicitante_modificar').classList.remove('col-md-6');
//                         //     document.getElementById('div_tipo_solicitante_modificar').classList.add('col-md-12');
//                         // }
//                     // }
                
//                 }else{
//                     let modal_Body = document.querySelectorAll('#modal--Body input');
//                     modal_Body.forEach ((input) => { input.value = ''; });
//                 }
//             }
//         });
//     });
// });
