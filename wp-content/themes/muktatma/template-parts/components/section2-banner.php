    <!-- Banner -->
    <!-- Add your banner HTML code here -->
    <div style="background-image: url('<?php echo esc_url(get_field('banner2_section_background_image_url') ? get_field('banner2_section_background_image_url')['url'] : 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); ?>');" class="banner">
        <div class="banner-content container">
            <h1 class="banner-title"><?php echo the_field('banner2_section_title'); ?></h1>
            <p class="banner-subtitle"><?php echo the_field('banner2_section_subtitle'); ?></p>
            <hr>
            <a href="<?php echo the_field('banner2_section_btn_url')?>" class="btn btn-primary"><?php the_field('banner2_section_btn_txt'); ?></a>
        </div>
    </div>
    

    