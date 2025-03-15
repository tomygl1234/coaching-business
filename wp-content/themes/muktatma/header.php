<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- inserta automaticamente el nombre de la página en que estamos -->
    <?php wp_head() ?>
</head>

<body>
    <header class="header">
        <div class="container navbar">
            <div >
                <!-- get_template_directory_uri nos detecta el directorio de nuestros assets para que no tengamos que escribir toda la dirección completa -->
                <a  class="logo" href="<?php echo get_site_url()?>">Miguel Wils</a>
            </div>
            <!-- Renderizado de main menu -->
            <?php
            $args = array(
                // theme location recibe qué menú dentro de functions quieres renderizar
                'theme_location' => 'main-menu',
                // container indica que queremos crear un div que contendra el menu
                'container' => 'nav',
                // container_class indica que queremos darle una clase al div que contiene el menu en este caso main-menu
                'container_class' => 'main-menu',
            );
            //wp_nav_menu renderiza el menú dentro de args
            wp_nav_menu($args)
            ?>
            <!-- Fin renderizado main menu -->
        </div>
    </header>