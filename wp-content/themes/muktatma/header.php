<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Inserta automáticamente el nombre de la página -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Saltar al contenido', 'muktatma'); ?>
    </a>

    <header class="header">
        <div class="navbar container">
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

    <main id="content" class="site-content">
</body>
</html>
