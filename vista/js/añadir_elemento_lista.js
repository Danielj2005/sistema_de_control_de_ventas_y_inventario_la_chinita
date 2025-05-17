// función para añadir un metodo de pago 

const btn_add = document.getElementById('btn_add');
const select = document.getElementById('producto_id');


function quitar_producto(num){
    let tr = document.getElementById(`producto_${num}`);
    tr.remove();
}

function validar_existencia() {
    const cards = document.querySelectorAll('#lista_productos .producto_');
    let existe = false;

    cards.forEach(card => {
        if (card.id === `producto_${select.value}`) {
            existe = true;
            // console.log(existe);
            return existe; // Exit the forEach loop early if the product exists
        }
    });
    // console.log(existe);
    return existe;
}

btn_add.addEventListener('click', (e) => {
    e.preventDefault();
    let params = {'id': select.value}
    $.ajax({
        data: params,
        url:  '../include/options_productos.php',
        type:  'post',
        success:function(valores){
            if (!validar_existencia()) {
                $('#lista_productos').append(valores);
            } else {
                swal("El producto ya existe en la lista", "Por favor, elija otro producto", "warning");
            }
        },
        error: function(){
            swal("ocurrio un error!","la solicitud no pudo ser procesada","error");
        }
    });
});