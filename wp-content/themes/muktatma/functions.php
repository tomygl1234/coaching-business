<?php
//includes
function muktatma_setup(){
    // featured image
    add_theme_support('post-thumbnails');
    //Titles for SEO
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'muktatma_setup');
// Menús
// este código hace aparecer la opción de crear menus en wp cpanel y se pueden añadir más dentro del arreglo de registernavmenus
function muktatma_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'muktatma'),
    ));
}
// add_action es para agregar codigo
add_action('init', 'muktatma_menus');
// add_filter esto es para modificar la informacion	


function muktatma_scripts_styles()
{
    // Normalize CSS
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    
    // Theme main stylesheet
    wp_enqueue_style('muktatma-style', get_stylesheet_uri(), array('normalize'), wp_get_theme()->get('Version'));
}

// Enqueue scripts and styles with priority 10
add_action('wp_enqueue_scripts', 'muktatma_scripts_styles', 10);