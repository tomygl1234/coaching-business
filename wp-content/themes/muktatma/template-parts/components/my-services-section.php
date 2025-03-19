<section class="section commitment-section">
    <div class="container">
        <h2><?php the_field('my_services_title') ?></h2>

        <div class="coaching-cards-container">
            <?php
            $args = array(
                'post_type' => 'my_services', // Cambiar a tu custom post type
                'posts_per_page' => -1, // Muestra todos los posts
            );
            $services_query = new WP_Query($args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="coaching-card card">
                        <h3><?php the_title(); ?></h3>
                        <p class="coaching-card-subtitle"><?php the_field('my_services_card_subtitle') ?></p>

                        <p><?php the_content(); ?></p>
                        <a href="<?php echo get_field('my_services_card_button_url') ?>" class="btn btn-secondary"><?php echo get_field('home_about_btn_text') ?: "Read more" ?></a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No hay servicios disponibles.</p>
            <?php endif; ?>
        </div>

    </div>
</section>