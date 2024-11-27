async function actualizarPrecioDolar() {
    try {
        // URL del Banco Central de Venezuela donde se obtiene la tasa de cambio
        const url = 'https://www.bcv.org.ve';

        // Realizar la petición HTTP utilizando fetch
        const response = await fetch(url);
        const html = await response.text();

        // Utilizar una librería de parsing HTML como Cheerio para extraer la información
        const $ = cheerio.load(html);

        // Seleccionar el elemento HTML que contiene el precio del dólar
        const precioDolar = document.querySelector('#dolar strong').textContent;
        let precio;

        for(let i = 0; i < 6; i++){
            precio += precioDolar[i]; 
        }

        console.log(precio);

        // Mostrar el precio en la página
        document.getElementById('tasa_dolar').textContent = precio;

    } catch (error) {
        console.error('Error al obtener el precio del dólar:', error);
        // Mostrar un mensaje de error al usuario
        document.getElementById('tasa_dolar').textContent = 'No se pudo obtener el precio del dólar en este momento.';
    }
}

// Obtener el botón por su ID
const btnUpdate = document.getElementById('btnUpdate');

// Agregar un event listener al botón
btnUpdate.addEventListener('click', actualizarPrecioDolar);