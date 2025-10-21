/*-------  Funcion para Mostrar ventana Modal en modulos del sistema ------- */

const btn_show_modal = (btn, nameModule) =>{
    const btn_modal = btn;

    // se recibe el objeto con la configuracion del modal
    const TitleId = dataModal[nameModule]?.modalTitleId ?? "exampleModalLabel";
    const BodyId = dataModal[nameModule]?.modalBodyId ?? "body_modal";
    const btnGuardarModal = dataModal[nameModule]?.modalBtnGuardar ?? "btn_guardar_modal";
    const URL = dataModal[nameModule]?.modalUrl ?? "";
    const Module = dataModal[nameModule]?.modalModule ?? "";
    const Title = dataModal[nameModule]?.modalTitle ?? "";
    const DiaglogId = dataModal[nameModule]?.modalDialogId ?? 'modal_tamano';
    const Size = dataModal[nameModule]?.modalSize ?? "";
    const SendForm = dataModal[nameModule]?.modalSendForm ?? false;
    const DataTable = dataModal[nameModule]?.modalDataTable ?? false;
    const ClassTable = dataModal[nameModule]?.modalClassTable ?? "";
    

    const titleId = document.getElementById(`${TitleId}`); 
    const body = document.getElementById(`${BodyId}`); 

    body.innerHTML = ""; // se inserta el resultado de la busqueda al modal

    const btn_guardar_modal = document.getElementById(`${btnGuardarModal}`);

    const elementId = (btn_modal.getAttribute('value') !== "") ? btn_modal.getAttribute('value') : ''; // id del registro para consultar informacion en la bd
    
    const modalDiaglog = document.getElementById(`${DiaglogId}`); // se elije dinamicamente el tamaño del modal dependiendo del modulo

    Size !== "" ? modalDiaglog.classList.add(`${Size}`) : '';

    if (Size == "" && modalDiaglog.classList.contains('modal-lg')) {
        modalDiaglog.classList.remove('modal-lg');
    }
    if (Size == "" && modalDiaglog.classList.contains('modal-xl')) {
        modalDiaglog.classList.remove('modal-xl');
    }

    
    titleId.innerHTML = Title; // titulo del modal a mostrar

    // se evalúa si el modal tendra un formulario para llamar a la funcion 'SendFormAjax()' para el envio de formularios en el modal
    
    $.ajax({
        data:  {'id' : elementId },
        url:  URL,
        type:  'post',
        success:function(valores){
            body.innerHTML = valores; // se inserta el resultado de la busqueda al modal
            
            SendForm ? SendFormAjax() : '';
            SendForm ? btn_guardar_modal.setAttribute('form','modalSendForm') : '';

            DataTable ? dataTable(`${ClassTable}`) : btn_guardar_modal.classList.remove('d-none');
            DataTable ? btn_guardar_modal.classList.add('d-none') : '';
            
            Module.includes('modify-rol') ? evaluar_casillas() : '';
        },
        error: function(){
            $('.msjFormSend').html(valores); // se inserta el resultado de la busqueda al modal
        }
    });
};


const activeModalBtn = document.querySelectorAll(`.btn_modal`);
activeModalBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        btn_show_modal(e.target, btn.getAttribute('modal'));
    })
});