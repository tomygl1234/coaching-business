<?php
class Muktatma_Logo_Social_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'muktatma_logo_social',
            __('Muktatma Logo & Social', 'muktatma'),
            array('description' => __('Widget para mostrar el logo y enlaces sociales', 'muktatma'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>
        <div class="logo-container">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <a class="logo" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
            
            <p><?php echo !empty($instance['description']) ? esc_html($instance['description']) : ''; ?></p>
            
            <div class="social-links">
                <?php
                $social_networks = array(
                    'facebook' => array('url' => $instance['facebook_url'], 'icon' => 'fab fa-facebook'),
                    'twitter' => array('url' => $instance['twitter_url'], 'icon' => 'fab fa-twitter'),
                    'instagram' => array('url' => $instance['instagram_url'], 'icon' => 'fab fa-instagram'),
                    'linkedin' => array('url' => $instance['linkedin_url'], 'icon' => 'fab fa-linkedin')
                );

                foreach ($social_networks as $network => $data) {
                    if (!empty($data['url'])) {
                        echo sprintf(
                            '<a href="%s" class="social-link" aria-label="%s" target="_blank"><i class="%s"></i></a>',
                            esc_url($data['url']),
                            esc_attr(ucfirst($network)),
                            esc_attr($data['icon'])
                        );
                    }
                }
                ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $description = !empty($instance['description']) ? $instance['description'] : '';
        $facebook_url = !empty($instance['facebook_url']) ? $instance['facebook_url'] : '';
        $twitter_url = !empty($instance['twitter_url']) ? $instance['twitter_url'] : '';
        $instagram_url = !empty($instance['instagram_url']) ? $instance['instagram_url'] : '';
        $linkedin_url = !empty($instance['linkedin_url']) ? $instance['linkedin_url'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Descripción:', 'muktatma'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" rows="3"><?php echo esc_textarea($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook_url')); ?>"><?php esc_html_e('URL de Facebook:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook_url')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook_url')); ?>" type="url" value="<?php echo esc_attr($facebook_url); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter_url')); ?>"><?php esc_html_e('URL de Twitter:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter_url')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter_url')); ?>" type="url" value="<?php echo esc_attr($twitter_url); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram_url')); ?>"><?php esc_html_e('URL de Instagram:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram_url')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram_url')); ?>" type="url" value="<?php echo esc_attr($instagram_url); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin_url')); ?>"><?php esc_html_e('URL de LinkedIn:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin_url')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin_url')); ?>" type="url" value="<?php echo esc_attr($linkedin_url); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
        $instance['facebook_url'] = (!empty($new_instance['facebook_url'])) ? esc_url_raw($new_instance['facebook_url']) : '';
        $instance['twitter_url'] = (!empty($new_instance['twitter_url'])) ? esc_url_raw($new_instance['twitter_url']) : '';
        $instance['instagram_url'] = (!empty($new_instance['instagram_url'])) ? esc_url_raw($new_instance['instagram_url']) : '';
        $instance['linkedin_url'] = (!empty($new_instance['linkedin_url'])) ? esc_url_raw($new_instance['linkedin_url']) : '';
        return $instance;
    }
} 