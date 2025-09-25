// se obtienen los botones para agregar datos a una lista
const btn_add = document.querySelectorAll('.btn_add');
// se obtienen los selects de productos o servicios
const selects = document.querySelectorAll('.select');

// funcion para quitar un elemento de una lista 
function quitar_elemento(id){
    let tr = document.getElementById(`${id}`);
    tr.remove();
}

// funcion para validar si un producto o servicio ya se encuentra en la lista
function validar_existencia(name_select, id_tr) {
    const rows = document.querySelectorAll(`#lista_${name_select} tr`);
    let existe = false;

    rows.forEach(row => {
        if (row.id == `tr_${name_select}_${id_tr}`) {
            existe = true;
            return existe; // Exit the forEach loop early if the product exists
        }
    });

    return existe;
}

btn_add.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
    
        let URL = "";

        // funcion para obtener la pagina actual getUrl() funcion global
        if (get_url() == 'generar_venta') {

            URL = btn.name == 'btn_add_servicio' ? '../include/servicios_venta.php' : '../include/productos_venta.php';
            
        }else{
            URL = btn.name == 'entrada_de_productos' ? '../include/tabla_productos.php' : '../include/productos_servicio.php';
            
        }

        //  se inicializan las variables de los selectores de producto o servicio
        let id_option_selected = "";
        let name_select = "";

        selects.forEach(select => {
            // se evalua si el boton de agregar tiene el nombre parecido al del selector de productos o servicios
            if (e.target.name.includes(`${select.name}`)) {
                // se extrae la id de la opcion seleccionada
                id_option_selected = select.value
                // se extrae el nombre del selector
                name_select = select.name;
            }
        });

        // se define la variable que tendrá la id que será consultada en la base de datos para mostrar la informacion en la lista
        const params = {'id': id_option_selected};

        $.ajax({
            data: params,
            url:  URL,
            type:  'post',
            success:function(valores){
                if (!validar_existencia(name_select, id_option_selected)) {
                    $(`#lista_${name_select}`).append(valores);
                } else {
                    Swal.fire("Advertencia!","El producto o servicio seleccionado ya existe en la lista, Por favor elija otra opción", "warning");
                }
            },
            error: function(){
                Swal.fire("ocurrio un error!","la solicitud no pudo ser procesada","error");
            }
        });
    });
});