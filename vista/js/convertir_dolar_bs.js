function convertir_usd_a_bs (id_precio_dolar) {
    const tasa = document.getElementById('tasa_dolar').textContent;
    // console.log('tasa_dolar es: ' + tasa); 
    
    const precio_bs = document.getElementById(`precio_unidad_bs_${id_precio_dolar}`);
    // console.log('<br> precio_bs es: ' + precio_bs);

    const precio_dolar = document.getElementById(`precio_unidad_dolar_${id_precio_dolar}`).value;
    // console.log('<br> precio_dolar es: ' + precio_dolar);

    const precio = precio_dolar * tasa;
    // console.log('<br> precio es: ' + precio);

    precio_bs.value = parseFloat(precio).toFixed(2);
    // console.log('<br> precio_bs es: ' + precio_bs);
}

function calcular_total () {
    const tasa = document.getElementById('tasa_dolar').textContent;
    // console.log('tasa_dolar es: ' + tasa); 
    const cantidad_item = document.querySelectorAll('.cantidad');
    // console.log('cantidad_item es: ' + cantidad_item);
    const precio_unidad_dolar = document.querySelectorAll(`.precio_unidad_dolar`);
    // console.log('<br> precio_bs es: ' + precio_bs);

    const totalDolar = document.getElementById('totalDolar');
    const totalBolivar = document.getElementById('totalBolivar');

    let total_dolar = 0;
    let cantidad = 0;
    
    cantidad_item.forEach(item => {
        if (item.value == '') {
            item.value = 0;
        }else {
            cantidad += parseInt(item.value);
        }
    })

    precio_unidad_dolar.forEach(item => {
        if (item.value == '') {
            item.value = 0;
        }else {
            total_dolar += parseInt(item.value);
        }
    })
    
    totalDolar.value = total_dolar * cantidad;
    totalBolivar.value = (total_dolar * cantidad) * tasa;
    
}
