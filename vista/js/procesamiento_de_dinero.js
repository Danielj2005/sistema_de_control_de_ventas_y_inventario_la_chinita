
function transformar(precio_dolar_x,precio_bolivares_x){
    // los argumentos recibidos son los id de los inputs con los precios de los productos
    precioDolares = document.getElementById(precio_dolar_x).value;
    precioDolares = (precioDolares == "") ? 0 : precioDolares;

    dolar = document.getElementById("precioDolar").value;

    bolivares = parseFloat(precioDolares,2) * parseFloat(dolar,2);
    document.getElementById(precio_bolivares_x).value = bolivares.toFixed(2);
}

function monto_total_productos() {
    let cantidad_total = document.querySelectorAll('.cantidad_total');
    let precio_dolar_total = document.querySelectorAll('.precio_dolar_total');
    let precio_bolivar_total = document.querySelectorAll('.precio_bolivar_total');
    let tasa_dolar = parseFloat(document.getElementById('precioDolar').value);
    let total_dolar = 0;
    let total_bolivar = 0;
    let total_cantidad = 0;
    
    for (let i = 0; i < cantidad_total.length; i++) {
        
        // se evalua si el campo de la cantidad de los productos en la lista esta vacío o no, en caso de que si se le asigna el valor de cero
        cantidad = (cantidad_total[i].value !== "")  ? cantidad_total[i].value : 0;
        total_cantidad += parseFloat(cantidad);

        // se evalua si el campo del precio del dolar de los productos en la lista esta vacío o no, en caso de que si se le asigna el valor de cero
        dolar_total = (precio_dolar_total[i].value !== "")  ? precio_dolar_total[i].value : 0;
        total_dolar += parseFloat(dolar_total) * cantidad;

        // se evalua si el campo del precio del bolivar de los productos en la lista esta vacío o no, en caso de que si se le asigna el valor de cero
        bolivar_total = (precio_bolivar_total[i].value !== "")  ? precio_bolivar_total[i].value : 0;
        total_bolivar += bolivar_total * cantidad;

        // se imprime en la vista el total del precio en dolar de los productos a ingresar en el inventario
        document.getElementById("totalDolar").value = total_dolar; 
        // se imprime en la vista el total del precio en bolivar de los productos a ingresar en el inventario
        document.getElementById("totalBolivar").value = total_bolivar.toFixed(2); 
    }

    add_iva(total_bolivar.toFixed(2),total_dolar);
}

// funcion para agregar el iva a la venta
function add_iva(sub_total_bs,sub_total_dolar){
    const iva = 0.16;
    const input_bolivares = document.getElementById('totalBolivar_iva');
    const input_dolares = document.getElementById('totalDolar_iva');

    let total_bolivares = parseFloat(sub_total_bs);
    let total_dolares = parseFloat(sub_total_dolar);

    total_bolivares = (total_bolivares * iva) + total_bolivares;
    total_dolares = (total_dolares * iva) + total_dolares;

    input_bolivares.value = total_bolivares.toFixed(2);
    input_dolares.value = total_dolares.toFixed(2)

}
