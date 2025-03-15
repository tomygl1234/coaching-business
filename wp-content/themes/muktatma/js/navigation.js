document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainMenu = document.querySelector('.main-menu');
    const header = document.querySelector('.header');
    let lastScroll = 0;

    // Crear el indicador de scroll
    const scrollProgress = document.createElement('div');
    scrollProgress.className = 'scroll-progress';
    const scrollBar = document.createElement('div');
    scrollBar.className = 'scroll-progress-bar';
    scrollProgress.appendChild(scrollBar);
    document.body.appendChild(scrollProgress);

    if (!menuToggle || !mainMenu) return;

    function toggleMenu() {
        const isOpen = mainMenu.classList.contains('is-active');
        
        menuToggle.classList.toggle('is-active');
        mainMenu.classList.toggle('is-active');
        
        // Bloquear scroll cuando el menú está abierto
        document.body.style.overflow = isOpen ? '' : 'hidden';
        
        // Remover todas las clases de scroll cuando el menú está abierto
        if (!isOpen) {
            header.classList.remove('scroll-down', 'scroll-up');
        }
        
        // Agregar índices para la animación de los items
        if (!isOpen) {
            const menuItems = mainMenu.querySelectorAll('li');
            menuItems.forEach((item, index) => {
                item.style.setProperty('--item-index', index);
            });
        }
    }

    // Toggle menu on button click
    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        toggleMenu();
    });

    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mainMenu.classList.contains('is-active')) {
            toggleMenu();
        }
    });

    // Close menu on resize if screen becomes larger than mobile breakpoint
    window.addEventListener('resize', function() {
        if (window.innerWidth > 999 && mainMenu.classList.contains('is-active')) {
            toggleMenu();
        }
    });

    // Cerrar menú al hacer click en un enlace
    mainMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menuToggle.classList.remove('is-active');
            mainMenu.classList.remove('is-active');
            document.body.style.overflow = '';
        });
    });

    // Manejar scroll
    window.addEventListener('scroll', () => {
        // No manejar el scroll si el menú está abierto
        if (mainMenu.classList.contains('is-active')) {
            header.classList.remove('scroll-down', 'scroll-up');
            return;
        }

        // Actualizar barra de progreso
        const winScroll = document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        scrollBar.style.width = scrolled + '%';

        // Header show/hide
        const currentScroll = window.pageYOffset;
        
        if (currentScroll <= 0) {
            header.classList.remove('scroll-up');
            return;
        }
        
        if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
            // Scroll Down
            header.classList.remove('scroll-up');
            header.classList.add('scroll-down');
        } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
            // Scroll Up
            header.classList.remove('scroll-down');
            header.classList.add('scroll-up');
        }
        
        lastScroll = currentScroll;
    });

    // Manejar estados de carga en botones
    document.querySelectorAll('.btn').forEach(button => {
        if (button.type === 'submit') {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                if (form && form.checkValidity()) {
                    this.classList.add('is-loading');
                }
            });
        }
    });
}); 