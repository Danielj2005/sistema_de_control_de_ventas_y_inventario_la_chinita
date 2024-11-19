// selector dinamico 
function select_dinamico(id_select_insertar,id_select_proviene){
    let select_proviene = document.getElementById(`${id_select_proviene}`);
    let select_insertar = document.getElementById(`${id_select_insertar}`);

    let URL = {
        'select_presentacion' : '../include/select_dinamico.php'
    };
    let valores_selects = {
        'id' : select_proviene.value
    };
    let parametros = {
        'id' : select_proviene.value
    };
    $.ajax({
        data:  parametros,
        url:   URL[select_insertar],
        type:  'post',
        dataType: 'json',
        success: function (datos) {
            $(`${select_insertar}`).val(datos);
        }
    });
}
// function actualizar_select() {

    
// }
// setInterval(() => {
//     actualizar_select();
// }, 1000);
