<?php
if (!defined('ABSPATH')) {
    exit; // Prevenir acceso directo al archivo
}

/**
 * Configuración principal del tema
 */
function muktatma_setup() {
    // Soporte para imagen destacada
    add_theme_support('post-thumbnails');
    // Soporte para títulos SEO
    add_theme_support('title-tag');
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'muktatma_setup');

/**
 * Registrar menús de navegación
 */
function muktatma_menus() {
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'muktatma'),
    ));
}
add_action('init', 'muktatma_menus');

/**
 * Cargar scripts y estilos del tema
 */
function muktatma_scripts_styles() {
    $theme_version = wp_get_theme()->get('Version');

    // Normalize CSS
    wp_enqueue_style(
        'normalize', 
        'https://necolas.github.io/normalize.css/8.0.1/normalize.css', 
        array(), 
        '8.0.1'
    );
    
    // Estilo principal del tema
    wp_enqueue_style(
        'muktatma-style', 
        get_stylesheet_uri(), 
        array('normalize'), 
        $theme_version
    );
    
    // Script de navegación
    wp_enqueue_script(
        'navigation-js', 
        get_template_directory_uri() . '/js/navigation.js', 
        array(), 
        $theme_version, 
        true
    );

    // Pasar variables al script de navegación
    wp_localize_script(
        'navigation-js',
        'muktatmaSettings',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'themeUrl' => get_template_directory_uri(),
        )
    );
}
add_action('wp_enqueue_scripts', 'muktatma_scripts_styles', 10);

/**
 * Función de seguridad para sanitizar datos
 */
function muktatma_sanitize_data($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $data[$key] = muktatma_sanitize_data($value);
        }
    } else {
        $data = sanitize_text_field($data);
    }
    return $data;
}

/**
*Deshabilitar el editor de archivos en el panel de administración por seguridad
 
*if (!defined('DISALLOW_FILE_EDIT')) {
    *define('DISALLOW_FILE_EDIT', true);
*}
**/

/**
 * Register Contact Form Customizer Settings
 */
function muktatma_contact_customizer_settings($wp_customize) {
    // Add Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Contact Information', 'muktatma'),
        'priority' => 30,
    ));

    // Address Setting
    $wp_customize->add_setting('contact_address', array(
        'default'           => '188 West 21th Street, Suite 721 New York NY 10016',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_address', array(
        'label'   => __('Address', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Phone Setting
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1235235598',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Phone Number', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Email Setting
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@yoursite.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'email',
    ));

    // Website Setting
    $wp_customize->add_setting('contact_website', array(
        'default'           => 'yoursite.com',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('contact_website', array(
        'label'   => __('Website URL', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'muktatma_contact_customizer_settings');