<section class="section">
    <div class="container">
        <h2 class="about-section-title"><?php echo get_field('home_about_title') ?: 'About us' ?></h2>
        <p class="about-section-description text-justify"><?php echo get_field('home_about_description') ?: $default_dummy_text ?></p>
        <a href="<?php echo get_field('home_about_btn_url') ?>" class="btn btn-primary"><?php echo get_field('home_about_btn_text') ?: "Read more" ?></a>
    </div>
</section>