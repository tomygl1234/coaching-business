    <!-- Banner -->
    <!-- Add your banner HTML code here -->
    <div style="background-image: url('<?php echo esc_url(get_query_var('bg_url')); ?>');" class="banner">
        <div class="banner-content container">
            <h1 class="banner-title"><?php echo get_query_var('title'); ?></h1>
            <p class="banner-subtitle"><?php echo get_query_var('subtitle'); ?></p>
            <hr>
            <a href="<?php echo the_field('hero_banner_btn_url')?>" class="btn btn-primary"><?php the_field('hero_banner_button'); ?></a>
        </div>
    </div>