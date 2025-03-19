<section class="section">
        <div class="container">
            <h2 class="method-section-h2">My Method</h2>
            <div class="method-section-card-list">
                <?php
                $args = array(
                    'post_type' => 'method_card',
                    'posts_per_page' => -1, // Muestra todos los posts
                );
                $method_query = new WP_Query($args);

                if ($method_query->have_posts()) :
                    while ($method_query->have_posts()) : $method_query->the_post(); ?>
                        <div class="method-section">
                            <h3 class="method-section-title"><?php the_title(); ?></h3>
                            <p class="method-section-description"><?php the_field('method_card_subtitle'); ?></p> <!-- Campo personalizado para el subtítulo -->
                            <p><?php the_field('method_card_description'); ?></p>
                            <h4>Enhancements</h4>
                            <ul>
                                <li><?php the_field('method_card_enhancement'); ?></li>
                                <li><?php the_field('method_card_enhancement_2'); ?></li>
                                <li><?php the_field('method_card_enhancement_3'); ?></li>
                            </ul>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No methods found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>