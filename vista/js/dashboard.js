
/* Obtener datos */

var parametros = {
    "buscar": "1",
    "producto" : "producto"
};

$.ajax({
  data:  parametros,
  url:   '../CONTROLADOR/buscar_producto.php',
  type:  'post',
  beforeSend: function(){
    alert("buscando");
  },
  error: function() {
  },
  success: function (datos) {
      var datosObj = $.parseJSON(datos);
      if (datosObj.existe==1) {
          $("#nombre").val(datosObj.nombre);
          $("#telefono").val(datosObj.telefono);
      }else{
          swal({
              title: "¡Cliente no registrado!",
              text: "el numero de cedula ingresada no se encuentra en el sistema",
              type: "info",
              confirmBottonText: "Aceptar"
          },
          function(isConfirm){  
              if (isConfirm) {     
                  $("#nombre").val("");
                  $("#telefono").val("");
              } else {    
                  $("#nombre").val("");
                  $("#telefono").val("");
              } 
          });
      }
      
  }
  
});



/* globals Chart:false, feather:false */

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo'
      ],
      datasets: [{
        data: [
          1,
          2,
          5,
          6,
          2,
          7,
          10
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          boxPadding: 3
        }
      }
    }
  })
})()
