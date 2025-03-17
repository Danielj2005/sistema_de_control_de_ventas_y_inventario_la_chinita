let div = document.querySelectorAll('.vista');

div.forEach((ul) => {

    ul.addEventListener('click', ()=>{
    
        let casillas = document.querySelectorAll(`.${ul.value}`);

        casillas.forEach((li)=>{

            if(li.checked == true){
                li.checked = false;
            }else{
                li.checked = true;
            }
        });
    })
});