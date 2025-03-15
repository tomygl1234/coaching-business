<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inserta automáticamente el nombre de la página -->
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="container navbar">
            <!-- Logo -->
            <div class="logo-container">
                <a class="logo" href="<?php echo get_site_url(); ?>">Miguel Wils</a>
            </div>
            <!-- Botón de menú hamburguesa -->
            <div class="menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- Renderizado del menú principal -->
            <?php
            $args = array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'main-menu',
            );
            wp_nav_menu($args);
            ?>
        </div>
    </header>
</body>
</html>
