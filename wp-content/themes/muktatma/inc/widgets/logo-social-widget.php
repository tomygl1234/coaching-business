<?php
class Muktatma_Logo_Social_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'muktatma_logo_social',
            __('Logo', 'muktatma'),
            array('description' => __('Widget for show brand logo', 'muktatma'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
?>
        <div class="logo-container">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <a class="logo" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>

            <p><?php echo !empty($instance['description']) ? esc_html($instance['description']) : ''; ?></p>


        </div>
    <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $description = !empty($instance['description']) ? $instance['description'] : '';
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Descripción:', 'muktatma'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" rows="3"><?php echo esc_textarea($description); ?></textarea>
        </p>

<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
        return $instance;
    }
}
