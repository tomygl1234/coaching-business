<?php
class Muktatma_Newsletter_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'muktatma_newsletter',
            __('Muktatma Newsletter', 'muktatma'),
            array('description' => __('Un formulario de newsletter con descripción personalizable', 'muktatma'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>
        <div class="footer-newsletter">
            <p class="newsletter-description"><?php echo !empty($instance['description']) ? esc_html($instance['description']) : ''; ?></p>
            <form class="newsletter-form" method="post">
                <div class="form-group">
                    <input class="footer-input" type="email" id="newsletter" name="newsletter_email" placeholder="<?php echo esc_attr($instance['placeholder']); ?>" required>
                    <button class="btn btn-secondary btn-newsletter" type="submit">
                        <span><?php echo esc_html($instance['button_text']); ?></span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Newsletter', 'muktatma');
        $description = !empty($instance['description']) ? $instance['description'] : __('Suscríbete para recibir las últimas actualizaciones y noticias.', 'muktatma');
        $placeholder = !empty($instance['placeholder']) ? $instance['placeholder'] : __('Tu email', 'muktatma');
        $button_text = !empty($instance['button_text']) ? $instance['button_text'] : __('Suscribirse', 'muktatma');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Título:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Descripción:', 'muktatma'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" rows="3"><?php echo esc_textarea($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"><?php esc_html_e('Placeholder del email:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder')); ?>" type="text" value="<?php echo esc_attr($placeholder); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php esc_html_e('Texto del botón:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text" value="<?php echo esc_attr($button_text); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
        $instance['placeholder'] = (!empty($new_instance['placeholder'])) ? strip_tags($new_instance['placeholder']) : '';
        $instance['button_text'] = (!empty($new_instance['button_text'])) ? strip_tags($new_instance['button_text']) : '';
        return $instance;
    }
} 