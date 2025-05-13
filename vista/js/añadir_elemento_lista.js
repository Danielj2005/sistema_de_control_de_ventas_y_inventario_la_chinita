// función para añadir un metodo de pago 
let i = 1;

const btn_add = document.getElementById('btn_add');

function añadir_elemento(options){
    // este tr será añadido a la tabla 
    let tr = ` <tr id="producto_${i}">
                    <td class="text-center col">${i}</td>
                    <td class="text-center col">
                        <select name="producto_[]" id="producto_${i}" class="form-select selector_producto">
                            <option value="" selected>seleccione una opción</option>
                            ${options}
                        </select>
                    </td>
                    <td class="text-center col">
                        <input type="text" class="form-control bg-dark-subtle" id="presentacion_${i}" name="presentacion" placeholder="selecciona la presentación" readOnly>
                    </td>

                    <td class="text-center col">
                        <input type="text" class="form-control bg-dark-subtle" id="stock_${i}" name="stock" placeholder="selecciona el stock" readOnly>
                    </td>

                    <td class="text-center col">
                        <input type="text" class="form-control bg-dark-subtle" id="cantidad_${i}" name="cantidad" placeholder="ingrese la cantidad" readOnly>
                    </td>

                    <td class="text-center col">
                        <input type="text" class="form-control" id="precio_compra_dolar_${i}" name="precio_compra_dolar[]" placeholder="ingresa el precio de compra en $" required>
                    </td>

                    <td class="text-center col">
                        <input type="text" class="form-control" id="precio_compra_bs_${i}" name="precio_compra_bs[]" placeholder="ingresa el precio de compra en BS" required>
                    </td>

                    <td class="text-center col">
                        <input type="text" class="form-control" id="precio_venta_dolar_${i}" name="precio_venta_dolar[]" placeholder="ingresa el precio de venta en $" required>
                    </td>

                    <td class="text-center col">
                        <button type="button" class="btn btn-sm btn-danger bi bi-trash" onclick="quitar_producto(${i})"></button>
                    </td>
                </tr>`;

    $('#lista_productos').append(tr);
}

function quitar_producto(num){
    let tr = document.getElementById(`producto_${num}`);
    tr.remove();
}

btn_add.addEventListener('click', (e) => {
    e.preventDefault();

    $.ajax({
        data:  '',
        url:  '../include/options_productos.php',
        type:  'post',
        success:function(valores){
            añadir_elemento(valores); 
        },
        error: function(){
            swal("ocurrio un error!","la solicitud no pudo ser procesada","error");
        }
    });
});