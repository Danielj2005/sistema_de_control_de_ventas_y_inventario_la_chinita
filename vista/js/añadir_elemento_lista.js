// función para añadir un metodo de pago 

const btn_add = document.querySelectorAll('.btn_add');
const selects = document.querySelectorAll('.select');


function quitar_elemento(id){
    let tr = document.getElementById(`${id}`);
    tr.remove();
}

function validar_existencia(name_select,id_tr) {

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
    
        const get_url = () => {
            let url = document.location.pathname.split("/");
            url = url[3].split(".php");
            url = url[0]
            return url;
        };

        let path = btn.getAttribute('path');

        // alert(path);

        let URL;

        const URL_VENTA = {
            '1' : '../include/servicios_venta.php',
            '2' : '../include/productos_venta.php'
        };

        const URLS = {
            'registrar_entrada' : '../include/tabla_productos.php',
            'agregar_servicio' : '../include/productos_servicio.php'
        };

        if (get_url() == 'generar_venta') {
            if (path == 1) {
                URL = URL_VENTA[path];
            } else if (path == 2) {
                URL = URL_VENTA[path];
            }
        }else{
            URL = URLS[get_url()];
        }


        let id_option_selected;
        let name_select;

        selects.forEach(select => {

            if (e.target.name.includes(`${select.name}`)) {
                id_option_selected = select.value
                name_select = select.name;
            }
        });

        let params = {'id': id_option_selected}

        $.ajax({
            data: params,
            url:  URL,
            type:  'post',
            success:function(valores){

                if (!validar_existencia(name_select,id_option_selected)) {

                    $(`#lista_${name_select}`).append(valores);
                } else {
                    swal("El producto ya existe en la lista", "Por favor, elija otro producto", "warning");
                }
            },
            error: function(){
                swal("ocurrio un error!","la solicitud no pudo ser procesada","error");
            }
        });
    });

});