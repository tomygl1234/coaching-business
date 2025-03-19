<section class="section faqs-section" aria-label="Frequently Asked Questions">
    <div class="container">
        <div class="accordion" role="tablist">
            <h2><?php the_field('home_faqs_section_title'); ?></h2>
            <?php
            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1, // Muestra todos los posts
            );
            $faq_query = new WP_Query($args);

            if ($faq_query->have_posts()) :
                while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                    <details>
                        <summary role="tab"><?php the_title(); ?></summary>
                        <div class="divider"></div>
                        <div class="content" role="tabpanel">
                            <?php the_content(); ?>
                        </div>
                    </details>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No FAQs found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

