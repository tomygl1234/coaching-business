<section class="section payment-section">
    <div class="container">
        <div class="payment-section">
            <h4><?php the_field('payment_section_title'); ?></h4>
            <p class="payment-description"><?php the_field('payment_subtitle_or_brief_description'); ?></p>
            <ul>
                <?php
                $args = array(
                    'post_type' => 'payment_option',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'menu_order'
                );
                $payment_options = new WP_Query($args);
                if ($payment_options->have_posts()) :
                    while ($payment_options->have_posts()) : $payment_options->the_post(); ?>
                        <li class="payment-card">
                            <p class="payment-title"><?php the_title(); ?></p>
                            <p class="payment-percentage"><?php the_field('payment_section_percent_quantity_or_prices'); ?></p>
                            <p class="payment-content"><?php the_content(); ?></p>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <li>
                        <p>There are not available posts.</p>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>