/*-------  Funcion para Mostrar ventana Modal modificar usuario  ------- */
const modificar_user = document.querySelectorAll('.modificar_user');
const contenedor = document.getElementById('modificar_usuario');

modificar_user.forEach((element)=>{
    element.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let user_id = element.getAttribute('valor');
        let modificar_empleado = element.getAttribute('module');

        let	parametros = {
            'id_usuario' : user_id,
            'modulo' : modificar_empleado
        };

        $.ajax({
            data:  parametros,
            url:  './modal/modificar_empleado.php',
            type:  'post',
            success:function(valores){
                contenedor.innerHTML = valores;
            }
        });
    });
});