<?php
class Muktatma_Navigation_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'muktatma_navigation',
            __('Muktatma Footer Navigation', 'muktatma'),
            array('description' => __('Widget de navegación para el footer', 'muktatma'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $nav_menu_args = array(
            'fallback_cb' => false,
            'container' => 'nav',
            'container_class' => 'footer-menu',
            'menu_class' => 'footer-menu-list'
        );

        if (!empty($instance['nav_menu'])) {
            $nav_menu_args['menu'] = $instance['nav_menu'];
        } else {
            $nav_menu_args['theme_location'] = 'footer-menu';
        }

        wp_nav_menu($nav_menu_args);

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Navegación', 'muktatma');
        $nav_menu = !empty($instance['nav_menu']) ? $instance['nav_menu'] : '';
        
        // Obtener todos los menús disponibles
        $menus = wp_get_nav_menus();
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Título:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('nav_menu')); ?>"><?php esc_html_e('Seleccionar Menú:', 'muktatma'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('nav_menu')); ?>" name="<?php echo esc_attr($this->get_field_name('nav_menu')); ?>">
                <option value=""><?php esc_html_e('— Seleccionar —', 'muktatma'); ?></option>
                <?php foreach ($menus as $menu): ?>
                    <option value="<?php echo esc_attr($menu->name); ?>" <?php selected($nav_menu, $menu->name); ?>>
                        <?php echo esc_html($menu->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['nav_menu'] = (!empty($new_instance['nav_menu'])) ? strip_tags($new_instance['nav_menu']) : '';
        return $instance;
    }
} 