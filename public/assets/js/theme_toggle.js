document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';

    // Aplica el tema actual al cargar la página
    document.body.classList.add(currentTheme);

    // Actualiza el texto del botón
    themeToggleButton.textContent = currentTheme === 'dark' ? 'Cambiar a Modo Claro' : 'Cambiar a Modo Oscuro';

    themeToggleButton.addEventListener('click', () => {
        // Alterna entre modos claro y oscuro
        const newTheme = document.body.classList.contains('dark') ? 'light' : 'dark';
        document.body.classList.remove('light', 'dark');
        document.body.classList.add(newTheme);

        // Guarda la preferencia del tema en localStorage
        localStorage.setItem('theme', newTheme);

        // Actualiza el texto del botón
        themeToggleButton.textContent = newTheme === 'dark' ? 'Cambiar a Modo Claro' : 'Cambiar a Modo Oscuro';
    });
});
