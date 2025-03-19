<section class="section payment-section">
    <div class="container">
        <div class="payment-section">
            <h4><?php the_field('payment_section_title'); ?></h4>
            <p><?php the_field('payment_subtitle_or_brief_description'); ?></p>
            <ul>
                <?php
                $args = array(
                    'post_type' => 'payment_option',
                    'posts_per_page' => -1,
                );
                $payment_options = new WP_Query($args);
                if ($payment_options->have_posts()) :
                    while ($payment_options->have_posts()) : $payment_options->the_post(); ?>
                        <li>

                            <p><?php the_title(); ?></p>


                            <p><?php the_field('payment_section_percent_quantity_or_prices'); ?></p>


                            <p><?php the_content(); ?></p>

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