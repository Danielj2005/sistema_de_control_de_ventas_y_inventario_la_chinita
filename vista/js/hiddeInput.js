function show_password() {
    const inputs = document.querySelectorAll(".input__field"); // se guardan los inputs de las contraseñas
    const icons = document.querySelectorAll(".input__icon"); // se guardan los iconos de los inputs de las contraseñas

    icons.forEach((icon, index) => {

        icon.addEventListener("click", (e) => {

            e.preventDefault();
            const input = inputs[index]; // se selecciona el input correspondiente al icono

            if (icon.classList.contains('bi-eye')) {
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
                input.type = 'text'; // se muestra la contraseña
            } else {
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
                input.type = 'password'; // se oculta la contraseña
            }
        });
    });
}

setInterval(() => {
    show_password();
    
}, 100);
