function consulta_tasa_dolar(){
    
    let tasa_dolar = document.getElementById('tasa_dolar');

    $.ajax({
        url:   "../include/consulta_tasa_dolar_include.php",
        type:  'post',
        success:  function (){

            if(valores.existe == 1){

                tasa_dolar.insertAdjacentText('beforeend',valores.dolar + '$');
            }
        }
    });
}

$(document).ready(function(){
    
});