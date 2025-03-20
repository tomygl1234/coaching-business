<?php
/*
Template Name: Payments page
*/
?>
<?php get_header(); ?>
<section class="section">
    <div class="container">
        <!-- Plantilla para mostrar la imagen destacada y el contenido de la página -->


        <h2 class="text-center"><?php the_title(); ?></h2>


        <div>
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full');
            }
            ?>
        </div>

        <p><?php the_content(); ?></p>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" width="100%" height="315" frameborder="0" allowfullscreen class="text-center"></iframe>
        </div>
        <?php get_template_part('template-parts/components/payment-section'); ?>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary btn-full text-center">Contact me</a>


    </div>
</section>
<?php get_footer(); ?>