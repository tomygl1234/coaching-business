<?php

/**
 * Template Name: Contact Page
 */

get_header(); ?>
<section class="section">
    <div class="container">
        <div class="text-center">
            <h1><?php the_title(); ?></h1>
        </div>
        <?php
        // Aquí insertas tu componente de contacto
        get_template_part('template-parts/components/contact-form');
        ?>
    </div>
</section>


<?php get_footer(); ?>