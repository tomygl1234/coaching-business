<?php
if (!defined('ABSPATH')) {
    exit; // Prevenir acceso directo al archivo
}

/**
 * Incluir archivos de widgets personalizados
 */
function muktatma_include_custom_widgets() {
    require_once get_template_directory() . '/inc/widgets/newsletter-widget.php';
    require_once get_template_directory() . '/inc/widgets/logo-social-widget.php';
    require_once get_template_directory() . '/inc/widgets/recent-posts-widget.php';
    require_once get_template_directory() . '/inc/widgets/navigation-widget.php';
}
add_action('after_setup_theme', 'muktatma_include_custom_widgets');

/**
 * Registrar widgets personalizados
 */
function muktatma_register_widgets() {
    register_widget('Muktatma_Newsletter_Widget');
    register_widget('Muktatma_Logo_Social_Widget');
    register_widget('Muktatma_Recent_Posts_Widget');
    register_widget('Muktatma_Navigation_Widget');
}
add_action('widgets_init', 'muktatma_register_widgets');

/**
 * Registrar áreas de widgets
 */
function muktatma_widgets_init() {
    // Widget área 1 - Logo y redes sociales
    register_sidebar(array(
        'name'          => __('Footer Logo & Social', 'muktatma'),
        'id'            => 'footer-1',
        'description'   => __('Área de widget para el logo y redes sociales', 'muktatma'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    // Widget área 2 - Menú de navegación
    register_sidebar(array(
        'name'          => __('Footer Navigation', 'muktatma'),
        'id'            => 'footer-2',
        'description'   => __('Área de widget para el menú de navegación', 'muktatma'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    // Widget área 3 - Posts Recientes
    register_sidebar(array(
        'name'          => __('Footer Recent Posts', 'muktatma'),
        'id'            => 'footer-3',
        'description'   => __('Área de widget para los posts recientes', 'muktatma'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    // Widget área 4 - Newsletter
    register_sidebar(array(
        'name'          => __('Footer Newsletter', 'muktatma'),
        'id'            => 'footer-4',
        'description'   => __('Área de widget para el formulario de newsletter', 'muktatma'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'muktatma_widgets_init');

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
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'muktatma_setup');

/**
 * Registrar menús de navegación
 */
function muktatma_menus() {
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'muktatma'),
        'footer-menu' => esc_html__('Footer Menu', 'muktatma'),
    ));
}
add_action('init', 'muktatma_menus');

/**
 * Añadir clases personalizadas al menú del footer
 */
function muktatma_footer_menu_classes($classes, $item, $args) {
    if($args->theme_location === 'footer-menu') {
        $classes[] = 'footer-menu-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'muktatma_footer_menu_classes', 10, 3);

/**
 * Configurar clases para el contenedor del menú del footer
 */
function muktatma_footer_menu_args($args) {
    if($args['theme_location'] === 'footer-menu') {
        $args['container'] = 'nav';
        $args['container_class'] = 'footer-menu';
        $args['menu_class'] = 'footer-menu-list';
    }
    return $args;
}
add_filter('wp_nav_menu_args', 'muktatma_footer_menu_args');

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
    
    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        array(),
        '5.15.4'
    );
    
    // Estilo principal del tema
    wp_enqueue_style(
        'muktatma-style', 
        get_stylesheet_uri(), 
        array('normalize', 'font-awesome'), 
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

    // Show Logo Setting
    $wp_customize->add_setting('contact_show_logo', array(
        'default'           => true,
        'sanitize_callback' => 'muktatma_sanitize_checkbox',
    ));
    $wp_customize->add_control('contact_show_logo', array(
        'label'   => __('Mostrar logo en el formulario de contacto', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'checkbox',
    ));

    // Main Title Setting
    $wp_customize->add_setting('contact_form_main_title', array(
        'default'           => 'Let\'s get in touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_main_title', array(
        'label'   => __('Título principal del formulario', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Description Setting
    $wp_customize->add_setting('contact_form_description', array(
        'default'           => 'We\'re open for any suggestion or just to have a chat',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_description', array(
        'label'   => __('Descripción del formulario', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'textarea',
    ));

    // Form Title Setting
    $wp_customize->add_setting('contact_form_form_title', array(
        'default'           => 'Get in touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_form_title', array(
        'label'   => __('Título del formulario de contacto', 'muktatma'),
        'section' => 'contact_info',
        'type'    => 'text',
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

/**
 * Sanitize checkbox values
 */
function muktatma_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}