<?php
if (!defined('ABSPATH')) {
    exit; // Prevenir acceso directo al archivo
}

/**
 * Incluir archivos de widgets personalizados
 */
function muktatma_include_custom_widgets()
{
    require_once get_template_directory() . '/inc/widgets/newsletter-widget.php';
    require_once get_template_directory() . '/inc/widgets/logo-social-widget.php';
    require_once get_template_directory() . '/inc/widgets/recent-posts-widget.php';
    require_once get_template_directory() . '/inc/widgets/navigation-widget.php';
}
add_action('after_setup_theme', 'muktatma_include_custom_widgets');

/**
 * Registrar widgets personalizados
 */
function muktatma_register_widgets()
{
    register_widget('Muktatma_Newsletter_Widget');
    register_widget('Muktatma_Logo_Social_Widget');
    register_widget('Muktatma_Recent_Posts_Widget');
    register_widget('Muktatma_Navigation_Widget');
}
add_action('widgets_init', 'muktatma_register_widgets');

/**
 * Registrar áreas de widgets
 */
function muktatma_widgets_init()
{
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
function muktatma_setup()
{
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
function muktatma_menus()
{
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'muktatma'),
        'footer-menu' => esc_html__('Footer Menu', 'muktatma'),
    ));
}
add_action('init', 'muktatma_menus');

/**
 * Añadir clases personalizadas al menú del footer
 */
function muktatma_footer_menu_classes($classes, $item, $args)
{
    if ($args->theme_location === 'footer-menu') {
        $classes[] = 'footer-menu-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'muktatma_footer_menu_classes', 10, 3);

/**
 * Configurar clases para el contenedor del menú del footer
 */
function muktatma_footer_menu_args($args)
{
    if ($args['theme_location'] === 'footer-menu') {
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
function muktatma_scripts_styles()
{
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
function muktatma_sanitize_data($data)
{
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
function muktatma_contact_customizer_settings($wp_customize)
{
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
function muktatma_sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}
function muktatma_enqueue_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@400;700&family=Lato:wght@400;700&family=Montserrat:wght@400;700&family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;700&family=Raleway:wght@400;700&family=Source+Sans+Pro:wght@400;700&family=Poppins:wght@400;700&family=Noto+Sans:wght@400;700&family=Libre+Baskerville:wght@400;700&family=Oswald:wght@400;700&family=PT+Sans:wght@400;700&family=Arvo:wght@400;700&family=Quicksand:wght@400;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'muktatma_enqueue_fonts');
function muktatma_customize_register($wp_customize)
{
    // Sección para colores
    $wp_customize->add_section('colors', array(
        'title' => __('Colors', 'muktatma'),
        'priority' => 30,
    ));

    // Sección para tipografía
    $wp_customize->add_section('typography', array(
        'title' => __('Typography', 'muktatma'),
        'priority' => 40,
    ));
    // Configuración para el color primario
    $wp_customize->add_setting('primary_color', array(
        'default' => '#131313',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color_control', array(
        'label' => __('Primary Color', 'muktatma'),
        'section' => 'colors',
        'settings' => 'primary_color',
    )));

    // Configuración para el color secundario
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color_control', array(
        'label' => __('Secondary Color', 'muktatma'),
        'section' => 'colors',
        'settings' => 'secondary_color',
    )));

    // Configuración para el color de acento
    $wp_customize->add_setting('accent_color', array(
        'default' => '#ffa500',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color_control', array(
        'label' => __('Accent Color', 'muktatma'),
        'section' => 'colors',
        'settings' => 'accent_color',
    )));

    // Configuración para el color de acento hover
    $wp_customize->add_setting('accent_hover_color', array(
        'default' => '#ca8000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_hover_color_control', array(
        'label' => __('Accent Hover Color', 'muktatma'),
        'section' => 'colors',
        'settings' => 'accent_hover_color',
    )));

    // Configuración para la opacidad del texto
    $wp_customize->add_setting('text_opacity_color', array(
        'default' => '#767676',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_opacity_color_control', array(
        'label' => __('Text Opacity Color', 'muktatma'),
        'section' => 'colors',
        'settings' => 'text_opacity_color',
    )));
    // Sección para tipografía
    $wp_customize->add_section('typography', array(
        'title' => __('Typography', 'muktatma'),
        'priority' => 40,
    ));

    // Configuración para la fuente principal
    $wp_customize->add_setting('font_main', array(
        'default' => 'serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('font_main_control', array(
        'label' => __('Main Font', 'muktatma'),
        'section' => 'typography',
        'settings' => 'font_main',
        'type' => 'select',
        'choices' => array(
            'serif' => __('Serif', 'muktatma'), // Asegúrate de que esta línea esté presente
            'sans-serif' => __('Sans Serif', 'muktatma'),
            'Roboto' => __('Roboto', 'muktatma'),
            'Open Sans' => __('Open Sans', 'muktatma'),
            'Lato' => __('Lato', 'muktatma'),
            'Montserrat' => __('Montserrat', 'muktatma'),
            'Merriweather' => __('Merriweather', 'muktatma'),
            'Playfair Display' => __('Playfair Display', 'muktatma'),
            'Raleway' => __('Raleway', 'muktatma'),
            'Source Sans Pro' => __('Source Sans Pro', 'muktatma'),
            'Poppins' => __('Poppins', 'muktatma'),
            'Noto Sans' => __('Noto Sans', 'muktatma'),
            'Libre Baskerville' => __('Libre Baskerville', 'muktatma'),
            'Oswald' => __('Oswald', 'muktatma'),
            'PT Sans' => __('PT Sans', 'muktatma'),
            'Arvo' => __('Arvo', 'muktatma'),
            'Quicksand' => __('Quicksand', 'muktatma'),
        ),
    ));

    // Configuración para la fuente de los encabezados
    $wp_customize->add_setting('font_headings', array(
        'default' => 'serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('font_headings_control', array(
        'label' => __('Headings Font', 'muktatma'),
        'section' => 'typography',
        'settings' => 'font_headings',
        'type' => 'select',
        'choices' => array(
            'serif' => __('Serif', 'muktatma'),
            'sans-serif' => __('Sans Serif', 'muktatma'),
            'Roboto' => __('Roboto', 'muktatma'),
            'Open Sans' => __('Open Sans', 'muktatma'),
            'Lato' => __('Lato', 'muktatma'),
            'Montserrat' => __('Montserrat', 'muktatma'),
            'Merriweather' => __('Merriweather', 'muktatma'),
            'Playfair Display' => __('Playfair Display', 'muktatma'),
            'Raleway' => __('Raleway', 'muktatma'),
            'Source Sans Pro' => __('Source Sans Pro', 'muktatma'),
            'Poppins' => __('Poppins', 'muktatma'),
            'Noto Sans' => __('Noto Sans', 'muktatma'),
            'Libre Baskerville' => __('Libre Baskerville', 'muktatma'),
            'Oswald' => __('Oswald', 'muktatma'),
            'PT Sans' => __('PT Sans', 'muktatma'),
            'Arvo' => __('Arvo', 'muktatma'),
            'Quicksand' => __('Quicksand', 'muktatma'),
        ),
    ));
}
add_action('customize_register', 'muktatma_customize_register');

function muktatma_custom_excerpt_more($more)
{
    return '</br>' . ' ...'; // Cambia el texto a "..."
}
add_filter('excerpt_more', 'muktatma_custom_excerpt_more');

function muktatma_custom_excerpt_length($length)
{
    return 30; // Cambia 30 por la cantidad de palabras que desees
}
add_filter('excerpt_length', 'muktatma_custom_excerpt_length');

// functions.php
function create_custom_post_type()
{
    register_post_type(
        'approach',
        array(
            'labels' => array(
                'name' => __('Approaches'),
                'singular_name' => __('Approach')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'approaches'),
            'show_in_rest' => true, // Para usar el editor de bloques
        )
    );
    register_post_type(
        'method_card',
        array(
            'labels' => array(
                'name' => __('Method Cards'),
                'singular_name' => __('Method Card')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'), // Soporta título, contenido y miniatura
            'rewrite' => array('slug' => 'method-cards'), // Slug para la URL
            'show_in_rest' => true, // Para usar el editor de bloques
        )
    );
    register_post_type(
        'payment_option',
        array(
            'labels' => array(
                'name' => __('Payment Options'),
                'singular_name' => __('Payment Option')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor'),
            'rewrite' => array('slug' => 'payment-options'),
        )
    );
    register_post_type(
        'my_services',
        array(
            'labels' => array(
                'name' => __('My Services'),
                'singular_name' => __('My Service')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'), // Soporta título, contenido y miniatura
            'rewrite' => array('slug' => 'my-services'), // Slug para la URL
            'show_in_rest' => true, // Para usar el editor de bloques
        )
    );
    
}
add_action('init', 'create_custom_post_type');
function registrar_post_type_faq()
{
    $args = array(
        'labels' => array(
            'name' => 'FAQs',
            'singular_name' => 'FAQ',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'faqs'),
    );
    register_post_type('faq', $args);
}
add_action('init', 'registrar_post_type_faq');

function allow_iframe($allowedposttags) {
    $allowedposttags['iframe'] = array(
        'src' => array(),
        'width' => array(),
        'height' => array(),
        'frameborder' => array(),
        'allowfullscreen' => array(),
    );
    return $allowedposttags;
}
add_filter('wp_kses_allowed_html', 'allow_iframe');

/**
 * Register Contact Messages Custom Post Type
 */
function muktatma_register_contact_message_post_type() {
    $labels = array(
        'name'                  => _x( 'Mensajes de Contacto', 'Post type general name', 'muktatma' ),
        'singular_name'         => _x( 'Mensaje de Contacto', 'Post type singular name', 'muktatma' ),
        'menu_name'             => _x( 'Mensajes', 'Admin Menu text', 'muktatma' ),
        'name_admin_bar'        => _x( 'Mensaje de Contacto', 'Add New on Toolbar', 'muktatma' ),
        'add_new'               => __( 'Añadir Nuevo', 'muktatma' ),
        'add_new_item'          => __( 'Añadir Nuevo Mensaje', 'muktatma' ),
        'new_item'              => __( 'Nuevo Mensaje', 'muktatma' ),
        'edit_item'             => __( 'Ver Mensaje', 'muktatma' ),
        'view_item'             => __( 'Ver Mensaje', 'muktatma' ),
        'all_items'             => __( 'Todos los Mensajes', 'muktatma' ),
        'search_items'          => __( 'Buscar Mensajes', 'muktatma' ),
        'not_found'             => __( 'No se encontraron mensajes.', 'muktatma' ),
        'not_found_in_trash'    => __( 'No hay mensajes en la papelera.', 'muktatma' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => array( 'title', 'custom-fields' ),
        'capabilities'       => array(
            'create_posts'   => 'do_not_allow',
            'edit_post'      => 'read_post',
            'edit_posts'     => 'read_posts',
        ),
        'map_meta_cap'       => true,
    );
    
    register_post_type( 'contact_message', $args );
}
add_action( 'init', 'muktatma_register_contact_message_post_type' );

/**
 * Add Custom Meta Box for Contact Message Details
 */
function muktatma_add_contact_message_meta_box() {
    add_meta_box(
        'contact_message_details',
        __( 'Detalles del Mensaje', 'muktatma' ),
        'muktatma_contact_message_meta_box_callback',
        'contact_message',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'muktatma_add_contact_message_meta_box' );

/**
 * Display Contact Message Meta Box
 */
function muktatma_contact_message_meta_box_callback( $post ) {
    // Recuperar los valores de metadatos
    $sender_name = get_post_meta( $post->ID, '_sender_name', true );
    $sender_email = get_post_meta( $post->ID, '_sender_email', true );
    $subject = get_post_meta( $post->ID, '_subject', true );
    $message = get_post_meta( $post->ID, '_message', true );
    
    // Si no hay mensaje en metadatos, usar el contenido del post
    if (empty($message)) {
        $message = $post->post_content;
    }
    
    // Estilo para el contenedor
    echo '<div class="contact-message-details" style="background: #f9f9f9; padding: 20px; border-radius: 5px; border: 1px solid #e0e0e0;">';
    
    // Información del remitente
    echo '<div class="sender-info" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eaeaea;">';
    
    // Campo nombre
    echo '<p><strong>' . __( 'Nombre:', 'muktatma' ) . '</strong> ' . esc_html( $sender_name ) . '</p>';
    
    // Campo email
    echo '<p><strong>' . __( 'Email:', 'muktatma' ) . '</strong> <a href="mailto:' . esc_attr( $sender_email ) . '">' . esc_html( $sender_email ) . '</a></p>';
    
    // Campo asunto
    echo '<p><strong>' . __( 'Asunto:', 'muktatma' ) . '</strong> ' . esc_html( $subject ) . '</p>';
    
    // Fecha de recepción
    echo '<p><strong>' . __( 'Recibido:', 'muktatma' ) . '</strong> ' . get_the_date('d/m/Y H:i:s', $post->ID) . '</p>';
    
    echo '</div>';
    
    // Campo mensaje
    echo '<div class="message-content" style="background: #fff; padding: 20px; border-radius: 4px; border: 1px solid #e5e5e5;">';
    echo '<h3 style="margin-top: 0; color: #23282d; font-size: 16px;">' . __( 'Mensaje:', 'muktatma' ) . '</h3>';
    echo '<div style="line-height: 1.6;">' . wpautop( esc_html( $message ) ) . '</div>';
    echo '</div>';
    
    echo '</div>';
    
    // Botón de respuesta rápida
    echo '<div class="quick-reply" style="margin-top: 20px;">';
    echo '<a href="mailto:' . esc_attr( $sender_email ) . '?subject=Re: ' . esc_attr( $subject ) . '" class="button button-primary">' . __( 'Responder por Email', 'muktatma' ) . '</a>';
    echo '</div>';
}

/**
 * Process Contact Form Submission
 */
function muktatma_process_contact_form() {
    // Verificar si es una solicitud de formulario de contacto
    if ( isset( $_POST['action'] ) && $_POST['action'] === 'contact_form' ) {
        
        // Verificar nonce para seguridad
        if ( ! isset( $_POST['contact_nonce'] ) || ! wp_verify_nonce( $_POST['contact_nonce'], 'contact_form_nonce' ) ) {
            wp_die( __( 'Verificación de seguridad fallida. Inténtalo de nuevo.', 'muktatma' ) );
        }
        
        // Sanitizar y validar datos
        $sender_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
        $sender_email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
        $subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
        $message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
        
        // Validación básica
        if ( empty( $sender_name ) || empty( $sender_email ) || empty( $subject ) || empty( $message ) ) {
            wp_redirect( add_query_arg( 'contact', 'incomplete', wp_get_referer() ) );
            exit;
        }
        
        // Crear post del tipo contact_message
        $post_data = array(
            'post_title'    => sprintf( __( 'Mensaje de %s', 'muktatma' ), $sender_name ),
            'post_content'  => $message,
            'post_status'   => 'publish',
            'post_type'     => 'contact_message',
        );
        
        $post_id = wp_insert_post( $post_data );
        
        if ( $post_id ) {
            // Guardar metadatos
            update_post_meta( $post_id, '_sender_name', $sender_name );
            update_post_meta( $post_id, '_sender_email', $sender_email );
            update_post_meta( $post_id, '_subject', $subject );
            update_post_meta( $post_id, '_message', $message );
            
            // Opcionalmente enviar email de notificación al administrador
            $admin_email = get_option( 'admin_email' );
            $site_name = get_bloginfo( 'name' );
            $email_subject = sprintf( __( '[%s] Nuevo mensaje de contacto de %s', 'muktatma' ), $site_name, $sender_name );
            
            $email_body = sprintf( __( 'Has recibido un nuevo mensaje de contacto en tu sitio %s.', 'muktatma' ), $site_name ) . "\n\n";
            $email_body .= __( 'Detalles del remitente:', 'muktatma' ) . "\n";
            $email_body .= __( 'Nombre:', 'muktatma' ) . ' ' . $sender_name . "\n";
            $email_body .= __( 'Email:', 'muktatma' ) . ' ' . $sender_email . "\n";
            $email_body .= __( 'Asunto:', 'muktatma' ) . ' ' . $subject . "\n\n";
            $email_body .= __( 'Mensaje:', 'muktatma' ) . "\n" . $message . "\n\n";
            $email_body .= __( 'Ver todos los mensajes:', 'muktatma' ) . ' ' . admin_url( 'edit.php?post_type=contact_message' );
            
            wp_mail( $admin_email, $email_subject, $email_body );
            
            // Redirección con mensaje de éxito
            wp_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ) );
            exit;
        } else {
            // Redirección con mensaje de error
            wp_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
            exit;
        }
    }
}
add_action( 'admin_post_contact_form', 'muktatma_process_contact_form' );
add_action( 'admin_post_nopriv_contact_form', 'muktatma_process_contact_form' );

/**
 * Display Contact Form Status Messages
 */
function muktatma_contact_form_status_messages() {
    if ( isset( $_GET['contact'] ) ) {
        $status = $_GET['contact'];
        $message = '';
        $class = '';
        
        switch ( $status ) {
            case 'success':
                $message = __( 'Gracias por tu mensaje. Te contactaremos pronto.', 'muktatma' );
                $class = 'success';
                break;
            case 'error':
                $message = __( 'Ocurrió un error al enviar tu mensaje. Por favor, inténtalo de nuevo.', 'muktatma' );
                $class = 'error';
                break;
            case 'incomplete':
                $message = __( 'Por favor, completa todos los campos requeridos.', 'muktatma' );
                $class = 'error';
                break;
        }
        
        if ( ! empty( $message ) ) {
            echo '<div class="contact-form-message ' . esc_attr( $class ) . '">' . esc_html( $message ) . '</div>';
            
            // Agregar estilos CSS inline
            echo '<style>
                .contact-form-message {
                    padding: 15px;
                    margin-bottom: 20px;
                    border-radius: 4px;
                }
                .contact-form-message.success {
                    background-color: #dff0d8;
                    color: #3c763d;
                    border: 1px solid #d6e9c6;
                }
                .contact-form-message.error {
                    background-color: #f2dede;
                    color: #a94442;
                    border: 1px solid #ebccd1;
                }
            </style>';
        }
    }
}
add_action( 'wp_footer', 'muktatma_contact_form_status_messages' );

/**
 * Modify Contact Form to Include Action and Nonce
 */
function muktatma_modify_contact_form() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.setAttribute('action', '<?php echo esc_url(admin_url('admin-post.php')); ?>');
            
            // Agregar campo hidden para la acción
            const actionInput = document.createElement('input');
            actionInput.setAttribute('type', 'hidden');
            actionInput.setAttribute('name', 'action');
            actionInput.setAttribute('value', 'contact_form');
            contactForm.appendChild(actionInput);
            
            // Agregar nonce para seguridad
            const nonceInput = document.createElement('input');
            nonceInput.setAttribute('type', 'hidden');
            nonceInput.setAttribute('name', 'contact_nonce');
            nonceInput.setAttribute('value', '<?php echo wp_create_nonce('contact_form_nonce'); ?>');
            contactForm.appendChild(nonceInput);
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'muktatma_modify_contact_form');

/**
 * Enqueue Contact Form Styles
 */
function muktatma_enqueue_contact_styles() {
    // Solo cargar en el frontend
    if (!is_admin()) {
        wp_enqueue_style('muktatma-contact-form', get_template_directory_uri() . '/assets/css/contact-form.css', array(), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'muktatma_enqueue_contact_styles');

/**
 * Enqueue Admin Contact Styles
 */
function muktatma_admin_contact_styles() {
    $screen = get_current_screen();
    
    // Solo cargar en las pantallas de mensajes de contacto
    if (isset($screen->post_type) && $screen->post_type === 'contact_message') {
        wp_enqueue_style('muktatma-admin-contact', get_template_directory_uri() . '/assets/css/contact-form.css', array(), '1.0.0');
    }
}
add_action('admin_enqueue_scripts', 'muktatma_admin_contact_styles');

/**
 * Add Unread Message Count to Admin Menu
 */
function muktatma_contact_menu_bubble() {
    global $menu;
    
    // Contar mensajes no leídos (no marcados como 'leído')
    $unread_count = wp_count_posts('contact_message');
    $count = 0;
    
    // Consideramos mensajes no leídos a los que tienen estado 'publish'
    if (isset($unread_count->publish)) {
        $count = $unread_count->publish;
    }
    
    // Si hay mensajes no leídos, mostramos el contador
    if ($count > 0) {
        foreach ($menu as $key => $value) {
            if (isset($value[2]) && $value[2] === 'edit.php?post_type=contact_message') {
                $menu[$key][0] .= ' <span class="contact-message-count">' . $count . '</span>';
                break;
            }
        }
    }
}
add_action('admin_menu', 'muktatma_contact_menu_bubble');

/**
 * Mark Contact Message as Read when viewed
 */
function muktatma_mark_contact_message_as_read() {
    global $post;
    
    // Verificar si estamos viendo un mensaje de contacto
    if (is_admin() && isset($post) && $post->post_type === 'contact_message') {
        // Verificar si ya se ha marcado como leído
        $is_read = get_post_meta($post->ID, '_message_read', true);
        
        // Si no se ha marcado como leído, marcarlo ahora
        if (!$is_read) {
            update_post_meta($post->ID, '_message_read', '1');
            
            // Opcionalmente, cambia el estado del post a 'leído'
            // wp_update_post(array(
            //     'ID' => $post->ID,
            //     'post_status' => 'read' // Necesitarías registrar este estado personalizado
            // ));
        }
    }
}
add_action('current_screen', 'muktatma_mark_contact_message_as_read');

/**
 * Add Custom Column to Contact Messages List
 */
function muktatma_add_contact_message_columns($columns) {
    $new_columns = array();
    
    // Mantener la casilla de verificación
    if (isset($columns['cb'])) {
        $new_columns['cb'] = $columns['cb'];
    }
    
    // Columna de estado (no leído/leído)
    $new_columns['status'] = '<span class="dashicons dashicons-visibility" title="' . __('Estado', 'muktatma') . '"></span>';
    
    // Remapear las columnas al orden deseado
    $new_columns['title'] = __('Remitente', 'muktatma');
    $new_columns['sender_email'] = __('Email', 'muktatma');
    $new_columns['subject'] = __('Asunto', 'muktatma');
    $new_columns['date'] = __('Fecha', 'muktatma');
    
    return $new_columns;
}
add_filter('manage_contact_message_posts_columns', 'muktatma_add_contact_message_columns');

/**
 * Display Custom Column Content
 */
function muktatma_contact_message_column_content($column, $post_id) {
    switch ($column) {
        case 'sender_email':
            $email = get_post_meta($post_id, '_sender_email', true);
            if ($email) {
                echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            } else {
                echo '—';
            }
            break;
            
        case 'subject':
            $subject = get_post_meta($post_id, '_subject', true);
            echo esc_html($subject ?: '—');
            break;
            
        case 'status':
            $is_read = get_post_meta($post_id, '_message_read', true);
            if ($is_read) {
                echo '<span class="dashicons dashicons-yes-alt" style="color: #46b450;" title="' . __('Leído', 'muktatma') . '"></span>';
            } else {
                echo '<span class="dashicons dashicons-email" style="color: #dc3232;" title="' . __('No leído', 'muktatma') . '"></span>';
            }
            break;
    }
}
add_action('manage_contact_message_posts_custom_column', 'muktatma_contact_message_column_content', 10, 2);

/**
 * Make Custom Columns Sortable
 */
function muktatma_contact_message_sortable_columns($columns) {
    $columns['subject'] = 'subject';
    $columns['status'] = 'status';
    return $columns;
}
add_filter('manage_edit-contact_message_sortable_columns', 'muktatma_contact_message_sortable_columns');

/**
 * Customize Contact Message Admin Interface
 * Remove edit capabilities and make it just a viewing interface
 */
function muktatma_contact_message_admin_custom_interface() {
    global $post_type;
    
    // Solo aplicar a nuestro post type
    if ('contact_message' !== $post_type) {
        return;
    }

    // CSS personalizado para ocultar elementos de edición
    ?>
    <style type="text/css">
        /* Ocultar elementos de edición */
        #edit-slug-box,
        #post-body-content .postbox,
        #minor-publishing-actions,
        #misc-publishing-actions,
        #titlediv .inside,
        .row-actions .edit,
        .row-actions .inline,
        .page-title-action,
        #screen-meta-links,
        .submitbox .deletion {
            display: none !important;
        }
        
        /* Cambiar etiquetas para reflejar que es solo visualización */
        #titlediv .components-base-control__label {
            font-weight: 600;
        }
        
        /* Hacer el título de solo lectura */
        #title {
            background-color: #f9f9f9;
            border-color: #ddd;
            pointer-events: none;
        }
        
        /* Estilo para la caja principal */
        #poststuff {
            margin-top: 20px;
        }
        
        /* Reestilizar el botón de actualizar */
        #publish {
            background-color: #f0f0f1;
            border-color: #0073aa;
            color: #0073aa;
        }
        
        #publish:hover {
            background-color: #f0f0f1;
            border-color: #006799;
            color: #006799;
        }
        
        /* Cambiar texto del botón */
        #publish {
            visibility: hidden;
        }
        
        #publish::after {
            content: "<?php esc_html_e('Marcar como leído', 'muktatma'); ?>";
            visibility: visible;
            display: block;
            margin-top: -30px;
        }
        
        /* Destacar mensajes no leídos */
        .contact-message-unread {
            background-color: #fcf8e3 !important;
        }
    </style>
    <?php
}
add_action('admin_head', 'muktatma_contact_message_admin_custom_interface');

/**
 * Make Title Field Read-Only for Contact Messages
 */
function muktatma_make_title_readonly() {
    global $post_type;
    
    if ('contact_message' === $post_type) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Hacer el título de solo lectura
                $('#title').attr('readonly', 'readonly');
                
                // Cambiar etiqueta del botón de actualizar
                $('#publish').attr('value', '<?php esc_html_e('Marcar como leído', 'muktatma'); ?>');
            });
        </script>
        <?php
    }
}
add_action('admin_footer-post.php', 'muktatma_make_title_readonly');
add_action('admin_footer-post-new.php', 'muktatma_make_title_readonly');

/**
 * Add Custom Row Actions for Contact Messages
 */
function muktatma_contact_message_row_actions($actions, $post) {
    if ('contact_message' === $post->post_type) {
        // Remover acciones no deseadas
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
        unset($actions['clone']);
        unset($actions['editinline']);
        
        // Cambiar "Ver" por "Abrir mensaje"
        if (isset($actions['view'])) {
            $actions['view'] = str_replace(__('View'), __('Abrir mensaje', 'muktatma'), $actions['view']);
        }
        
        // Añadir acción de responder por email
        $email = get_post_meta($post->ID, '_sender_email', true);
        $subject = get_post_meta($post->ID, '_subject', true);
        
        if ($email) {
            $actions['reply'] = '<a href="mailto:' . esc_attr($email) . '?subject=Re: ' . esc_attr($subject) . '" class="reply">' . 
                __('Responder', 'muktatma') . '</a>';
        }
    }
    
    return $actions;
}
add_filter('post_row_actions', 'muktatma_contact_message_row_actions', 10, 2);

/**
 * Highlight Unread Messages in Admin List
 */
function muktatma_highlight_unread_messages($classes, $class, $post_id) {
    if (get_post_type($post_id) === 'contact_message') {
        $is_read = get_post_meta($post_id, '_message_read', true);
        
        if (!$is_read) {
            $classes[] = 'contact-message-unread';
        }
    }
    
    return $classes;
}
add_filter('post_class', 'muktatma_highlight_unread_messages', 10, 3);