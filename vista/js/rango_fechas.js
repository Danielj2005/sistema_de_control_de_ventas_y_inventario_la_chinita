

function dateValidate(){
    const inputDateStart = document.getElementById('fecha_inicio').value;
    const inputDateEnd = document.getElementById('fecha_fin').value;
    const btn_enviar = document.getElementById('btn_fechas');

    let msjDate = document.getElementById('mensaje_fecha_iguales');

    if (inputDateStart != "" && inputDateEnd != "") {
        if (inputDateStart > inputDateEnd) {
            msjDate.classList.remove('d-none');
            msjDate.classList.add('d-block');

            btn_enviar.setAttribute('disabled','disabled');

        }else{
            msjDate.classList.remove('d-block');
            msjDate.classList.add('d-none');

            btn_enviar.classList.remove('btn-outline-secondary');
            btn_enviar.classList.add('btn-outline-primary');

            btn_enviar.removeAttribute('disabled');
            fechas_mayores();
        }
    }
}


function fechas_mayores(){
    const inputDateStart = document.getElementById('fecha_inicio').value;
    const inputDateEnd = document.getElementById('fecha_fin').value;

    let msjDateOld = document.getElementById('mensaje_fechas_mayores');
    let dateToday = document.getElementById('fecha_actual').value;
    const btn_enviar = document.getElementById('btn_fechas');

    if (inputDateStart != "" && inputDateEnd != "") {

        if ( inputDateStart > dateToday || inputDateEnd > dateToday){

            msjDateOld.classList.remove('d-none');
            msjDateOld.classList.add('d-block');

            btn_enviar.classList.remove('btn-outline-primary');
            btn_enviar.classList.add('btn-outline-secondary');
            btn_enviar.setAttribute('disabled','disabled');

        }else{
            msjDateOld.classList.remove('d-block');
            msjDateOld.classList.add('d-none');

            btn_enviar.classList.remove('btn-outline-secondary');
            btn_enviar.classList.add('btn-outline-primary');

            btn_enviar.removeAttribute('disabled');
        }
    }
}

const reportDates = document.querySelectorAll('.reportDates');
reportDates.forEach(input => {
    input.addEventListener('change', () => {

        const msjDate = document.querySelector('.showThis');

        const dateToday = document.getElementById('fecha_actual').value;

        const fechaReporteInicio = document.getElementById('fechaReporteInicio').value;
        const fechaReporteFin = document.getElementById('fechaReporteFin').value;

        const btnReportesFechas = document.getElementById('btnReportesFechas');

        if (fechaReporteInicio != "" && fechaReporteFin != "") {

            if (fechaReporteInicio > fechaReporteFin || fechaReporteInicio > dateToday || fechaReporteFin > dateToday) {
                msjDate.classList.toggle('d-none');
            }else{
                btnReportesFechas.classList.toggle('d-none');
            }
        }
    });
});
