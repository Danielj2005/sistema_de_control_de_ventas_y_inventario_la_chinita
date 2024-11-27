function send_data(){
    const form = document.getElementById('generar_venta');
    const dataForm = new FormData(form);

    fetch("./factura.php",{
        method : 'POST',
        body : dataForm
    })
    .then(response => {
        if(!response.ok){
            throw new Error('la solicitud no fue exitosa');
        }
        window.location.href="./factura.php"
    })
    .catch(error=>{
        console.error('Error al enciar los datos:',error);
        alert('Error al enviar los datos por favor intente nuevamente');
    })

}