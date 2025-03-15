<?php
class Muktatma_Recent_Posts_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'muktatma_recent_posts',
            __('Muktatma Recent Posts', 'muktatma'),
            array('description' => __('Muestra los posts recientes con imagen y fecha', 'muktatma'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $number_of_posts = !empty($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;

        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => $number_of_posts,
            'post_status' => 'publish'
        ));
        
        if (!empty($recent_posts)) {
            echo '<div class="footer-posts">';
            
            foreach ($recent_posts as $post) {
                $post_date = get_the_date('j M Y', $post['ID']);
                ?>
                <article class="footer-post">
                    <?php if (has_post_thumbnail($post['ID'])) : ?>
                        <a href="<?php echo get_permalink($post['ID']); ?>" class="footer-post-thumbnail">
                            <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="footer-post-content">
                        <h4>
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <?php echo wp_trim_words($post['post_title'], 6); ?>
                            </a>
                        </h4>
                        <span class="footer-post-date">
                            <?php echo $post_date; ?>
                        </span>
                    </div>
                </article>
                <?php
            }
            
            echo '</div>';
        }

        wp_reset_postdata();
        
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Últimos Posts', 'muktatma');
        $number_of_posts = !empty($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Título:', 'muktatma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"><?php esc_html_e('Número de posts a mostrar:', 'muktatma'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number_of_posts); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? absint($new_instance['number_of_posts']) : 3;
        return $instance;
    }
} 