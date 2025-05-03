
/*-------  Funcion para Mostrar ventana Modal modificar usuario  ------- */
const btn_modal = document.querySelectorAll('.btn_modal');
const contenedor = document.getElementById('body_modal');
const titulo_modal = document.getElementById('exampleModalLabel');
const btn_guardar_modal = document.getElementById('btn_guardar_modal');

btn_modal.forEach((btn_update)=>{
    btn_update.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let id = btn_update.getAttribute('value');
        let modal = btn_update.getAttribute('modal');
        let url = btn_update.getAttribute('url');
        let	parametros = { 'id' : id  };
        
        switch (modal) {
            case 'modificar_info_personal_usuario':
                titulo_modal.innerHTML = '<i class="bi bi-person"></i> &nbsp; Actualizar información personal';
                
                break;

            case 'ver':
                btn_guardar_modal.classList.add('d-none');
                
                break;

            case 'datos_usuario':
                titulo_modal.innerHTML = '<i class="bi bi-person-circle"></i> &nbsp; Actualizar datos de la cuenta del usuario';
                
                break;

            case 'preguntas_seguridad':
                titulo_modal.innerHTML = '<i class="bi bi-person-circle"></i> &nbsp; Actualizar preguntas de seguridad del usuario';
                
                break;

            case 'modificar':
                btn_guardar_modal.setAttribute('form','update_user_info');
                
                break;
            case value:
                
                break;
            case value:
                
                break;
            case value:
                
                break;
        
            default:
                btn_guardar_modal.classList.remove('d-none');
                break;
        }


        $.ajax({
            data:  parametros,
            url:  url,
            type:  'post',
            success:function(valores){
                contenedor.innerHTML = valores;
                if (modal == 'modificar_rol_usuario') {
                    evaluar_casillas (); // Llama a la función para evaluar las casillas
                }
            }
        });
    });
});