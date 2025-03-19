<?php
/*
Template Name: About Me
*/
?>
<?php get_header(); ?>
<section class="section">
    <div class="container">
        <!-- Plantilla para mostrar la imagen destacada y el contenido de la página -->
        <div class="about-me-container">
            <div class="about-me-image-left">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                }
                ?>
            </div>
            <div class="about-me-description">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>