document.addEventListener('DOMContentLoaded', () => {
    const themeBtn = document.getElementById('lightModeButton');
    const iconMode = themeBtn.querySelector('i');

    // Función para actualizar la interfaz del botón
    function updateUI(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('light');

            iconMode.classList.add('bi-sun-fill', 'text-amber-400');
            iconMode.classList.remove('bi-moon-fill', 'text-black');
        } else {
            document.documentElement.classList.add('light');
            document.documentElement.classList.remove('dark');

            iconMode.classList.add('bi-moon-fill', 'text-black');
            iconMode.classList.remove('bi-sun-fill', 'text-amber-400');
        }
    }

    // 1. Sincronizar UI al cargar la página
    const currentTheme = localStorage.getItem('theme') ?? 'light';
    updateUI(currentTheme);

    // 2. Manejar el clic
    themeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const activeTheme = localStorage.getItem('theme') ?? 'dark';
        const newTheme = activeTheme === 'dark' ? 'light' : 'dark';

        localStorage.setItem('theme', newTheme);
        updateUI(newTheme);
    });
});