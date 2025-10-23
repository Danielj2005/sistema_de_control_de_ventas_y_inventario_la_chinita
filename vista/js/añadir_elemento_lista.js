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

const urlAPI = (btnAddName) => {
    switch (get_url()) {
        // endpoints para el modulo de Ventas
        case "generar_venta": 
            if (btnAddName == "btn_producto") {
                return "añadir_productos_a_venta";
            }else if (btnAddName == "btn_add_servicio") {
                return "añadir_servico_a_venta";
            }
            break;
        // endpoints para el modulo de Productos
        case "entrada_de_productos": return "productos_compra_a_proveedores";

        // endpoints para el modulo de Servicios
        case "gestion_servicios": return "añadir_productos_a_servicio";

        default: return "";
    }
};


btn_add.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
    
        const MODULO = urlAPI(btn.name);

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

        $.ajax({
            data: {'id': id_option_selected, module: MODULO},
            url:  URL_API,
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