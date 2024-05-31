/**************************** funcion para cambiar las vistas en 'mi perfil' y 'ajustes' ****************************/
function cambiar_vista(option){
   
    // Obtener los contenedores de las vistas
    let mi_informacion_container = document.querySelector(".mi_informacion_container");
    let actualizar_mi_informacion_container = document.querySelector(".actualizar_mi_informacion_container");
   
    // Obtener los botones de las vistas
    let btn_mi_informacion = document.querySelector('#btn_mi_informacion');
    let btn_actualizar_mi_informacion = document.querySelector('#btn_actualizar_mi_informacion');

    // se obtiene el loader - ( cargando.... )
    let loader = document.querySelector('#sub_loader');
    // let loader = document.querySelector('.loader');
    loader.classList.remove('d-none');
    // loader.style.display = "flex";

    // Mostrar el contenedor correspondiente al valor seleccionado
    if (option === "mi_informacion") {// info personal
        setTimeout(function() {
            mi_informacion_container.classList.remove('d-none');
            actualizar_mi_informacion_container.classList.add('d-none');

            btn_mi_informacion.classList.remove('btn-secondary');
            btn_mi_informacion.classList.add('btn-primary');

            btn_actualizar_mi_informacion.classList.remove('btn-primary');
            btn_actualizar_mi_informacion.classList.add('btn-secondary');

            loader.classList.add('d-none');

            // loader.style.display = "none";
        }, 500);

    } else if (option === "actualizar_mi_informacion") {// datos de usuario
        setTimeout(function() {

            actualizar_mi_informacion_container.classList.remove('d-none');
            mi_informacion_container.classList.add('d-none');

            btn_actualizar_mi_informacion.classList.remove('btn-secondary');
            btn_actualizar_mi_informacion.classList.add('btn-primary');
            
            btn_mi_informacion.classList.add('btn-secondary');
            btn_mi_informacion.classList.remove('btn-primary');

            // loader.style.display = "none";
            loader.classList.add('d-none');
        }, 500);

    }
}