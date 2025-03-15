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
function muktatma_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'muktatma'),
    ));
}
add_action('init', 'muktatma_menus');

// Enqueue Scripts and Styles
function muktatma_scripts_styles()
{
    // Normalize CSS
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    
    // Theme main stylesheet
    wp_enqueue_style('muktatma-style', get_stylesheet_uri(), array('normalize'), wp_get_theme()->get('Version'));
    
    // Enqueue navigation.js from the "js" folder
    wp_enqueue_script('navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), null, true); // true for footer
}

// Enqueue scripts and styles with priority 10
add_action('wp_enqueue_scripts', 'muktatma_scripts_styles', 10);
