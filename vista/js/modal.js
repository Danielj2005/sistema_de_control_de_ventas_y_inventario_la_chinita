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
            document.getElementById('exampleModalLabel').textContent="Permisos de acceso a los modulos";
        }else{
            document.getElementById('exampleModalLabel').textContent="Modificación de acceso a los modulos";
            btn_guardar_modal.classList.remove('d-none');
        }
        $.ajax({
            data:  parametros,
            url:  url,
            type:  'post',
            success:function(valores){
                contenedor.innerHTML = valores;
                let div = document.querySelectorAll('.vista');

                div.forEach((ul) => {

                    ul.addEventListener('click', ()=>{
                    
                        let casillas = document.querySelectorAll(`.${ul.value}`);

                        casillas.forEach((li)=>{

                            if(li.checked == true){
                                li.checked = false;
                            }else{
                                li.checked = true;
                            }
                        });
                    })
                });
            }
        });
    });
});