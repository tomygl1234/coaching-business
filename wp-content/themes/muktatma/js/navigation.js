document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainMenu = document.querySelector('.main-menu');
    let isMenuOpen = false;

    if (!menuToggle || !mainMenu) return;

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        menuToggle.setAttribute('aria-expanded', isMenuOpen);
        mainMenu.classList.toggle('is-active');
    }document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mainMenu = document.querySelector('.main-menu');
        const logo = document.querySelector('.logo');
        let isMenuOpen = false;
    
        if (!menuToggle || !mainMenu) return;
    
        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            menuToggle.setAttribute('aria-expanded', isMenuOpen);
            mainMenu.classList.toggle('is-active');
        }
    
        // Toggle menu on button click
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });
    
        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMenu();
            }
        });
    
        // Close menu on resize if screen becomes larger than mobile breakpoint
        window.addEventListener('resize', function() {
            if (window.innerWidth > 999 && isMenuOpen) {
                toggleMenu();
            }
        });
    });
    

    function closeMenu() {
        if (isMenuOpen) {
            isMenuOpen = false;
            menuToggle.setAttribute('aria-expanded', 'false');
            mainMenu.classList.remove('is-active');
        }
    }

    // Toggle menu on button click
    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        toggleMenu();
    });

    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMenu();
        }
    });

    // Close menu on resize if screen becomes larger than mobile breakpoint
    window.addEventListener('resize', function() {
        if (window.innerWidth > 999 && isMenuOpen) {
            closeMenu();
        }
    });
}); 