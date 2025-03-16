<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Inserta automáticamente el nombre de la página -->
    <?php wp_head(); ?>
    <style>
        :root {
            --primary: <?php echo get_theme_mod('primary_color', '#131313'); ?>;
            --secondary: <?php echo get_theme_mod('secondary_color', '#ffffff'); ?>;
            --accent: <?php echo get_theme_mod('accent_color', 'orange'); ?>;
            --accent-hover: <?php echo get_theme_mod('accent_hover_color', '#ca8000'); ?>;
            --text-opacity: <?php echo get_theme_mod('text_opacity_color', '#767676'); ?>;
            --font-main: <?php echo get_theme_mod('font_main', 'serif'); ?>;
            --font-headings: <?php echo get_theme_mod('font_headings', 'serif'); ?>;
            --font-main: <?php echo get_theme_mod('font_main', 'serif'); ?>;
            --font-headings: <?php echo get_theme_mod('font_headings', 'serif'); ?>;
        }
    </style>
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
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a class="logo" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
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