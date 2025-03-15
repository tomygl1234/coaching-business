    <!-- Banner -->
    <!-- Add your banner HTML code here -->
    <div style="background-image: url('<?php echo esc_url(get_query_var('bg_url')); ?>');" class="banner">
        <div class="banner-content container">
            <h1 class="banner-title"><?php echo get_query_var('title'); ?></h1>
            <p class="banner-subtitle"><?php echo get_query_var('subtitle'); ?></p>
            <hr>
            <a href="#" class="btn btn-primary"><?php echo get_query_var('button'); ?></a>
        </div>
        
    </div>