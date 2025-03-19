<section class="section">
        <div class="container">
            <h2 class="approach-section-title">My Approach</h2>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'approach',
                    'posts_per_page' => -1, // Muestra todos los posts
                );
                $approach_query = new WP_Query($args);

                if ($approach_query->have_posts()) :
                    while ($approach_query->have_posts()) : $approach_query->the_post(); ?>
                        <div class="col">
                            <div class="card">
                                <h3><?php the_field('approach_card_title'); ?></h3> <!-- Campo personalizado para el título -->
                                <h4><?php the_field('approach_card_subtitle'); ?></h4> <!-- Campo personalizado para el subtítulo -->
                                <p class="text-justify"><?php the_field('approach_card_description'); ?></p> <!-- Campo personalizado para la descripción -->
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No approaches found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>