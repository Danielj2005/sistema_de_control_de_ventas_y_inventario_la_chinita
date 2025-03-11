let contenedor = document.getElementById('cliente');
let casillas = document.querySelectorAll('.rol_cliente');

contenedor.addEventListener('click', ()=>{
	casillas.forEach((li)=>{
        if(li.checked == true){
            li.checked = false;
        }else{
            li.checked = true;
        }
    });
})