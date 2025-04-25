
/*-------  Funcion para Mostrar ventana Modal modificar usuario  ------- */
const btn_modal = document.querySelectorAll('.btn_modal');
const contenedor = document.getElementById('body_modal');

btn_modal.forEach((element)=>{
    element.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let id = element.getAttribute('value');
        let url = element.getAttribute('url');
        const btn_guardar_modal = document.getElementById('btn_guardar_modal');
        let estado_btn_guardar_modal = element.getAttribute('btn');

        let	parametros = { 'id' : id  };

        if (estado_btn_guardar_modal == "ver") {
            btn_guardar_modal.classList.add('d-none');
            document.getElementById('exampleModalLabel').textContent="Permisos de acceso a los módulos";
        }else{
            document.getElementById('exampleModalLabel').textContent="Modificación de acceso a los módulos";
            btn_guardar_modal.classList.remove('d-none');
        }
        $.ajax({
            data:  parametros,
            url:  url,
            type:  'post',
            success:function(valores){
                contenedor.innerHTML = valores;
                evaluar_casillas (); // Llama a la función para evaluar las casillas
            }
        });
    });
});