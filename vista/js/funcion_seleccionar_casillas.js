
function evaluar_casillas () { // Función para evaluar las casillas
    const div = document.querySelectorAll('.vista'); // Selecciona todos los divs con la clase 'vista'

    div.forEach((ul) => { // Itera sobre cada div

        ul.addEventListener('click', ()=>{  // Añade un evento de clic a cada div
        
            let casillas = document.querySelectorAll(`.${ul.value}`); // Selecciona todas las casillas dentro del div que se ha clicado
            let estado_casilla = ul.checked; // Estado de la casilla que se ha marcado o desmarcado
            
            casillas.forEach((li)=>{

                li.checked = estado_casilla; // Cambia el estado de la casilla
            });
        })
    });
}
