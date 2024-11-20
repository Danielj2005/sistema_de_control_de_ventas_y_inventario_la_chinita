const form_fechas = document.getElementById('rango_fechas');
const input_fecha1 = document.getElementById('fecha1').value;
const input_fecha2 = document.getElementById('fecha2').value;
const fecha_actual = document.getElementById('fecha_actual').value;
const btn_enviar = document.getElementById('btn_fechas');


form_fechas.addEventListener('submit',(e)=>{
    e.preventDefault();
    let datos = new FormData(form_fechas);

    if (input_fecha1 > fecha_actual || input_fecha2 > fecha_actual){
        swal({ 
            title:"¡Ocurrió un error en la selección de Fechas!", 
            text: "No se puede realizar la operación si las fechas son superiores a la actual, por favor verifique e intente nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    }else  if (input_fecha1 >= input_fecha2){
        swal({ 
            title:"¡Ocurrió un error en la selección de Fechas!", 
            text: "No se puede realizar la operación si la fecha inicial es superior o igual a la actual, por favor verifique e intente nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    }else{
        location.reload();
    }


});