<?php get_header(); ?>

<div class="section">
    <div class="container">
        <div class="text-center">
            <h1 class="page-title">My Blog Posts and News</h1>
        </div>
        <div class="blog-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-image">
                                <?php the_post_thumbnail('large', array('loading' => 'lazy')); // Carga diferida ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h2 class="blog-title"><?php the_title(); ?></h2>
                            <div class="blog-meta">
                                <span class="date"><?php the_date(); ?></span>
                            </div>
                        </div>

                        <div class="blog-meta">
                            <span class="author">By: <?php the_author(); ?></span>
                        </div>
                        <div class="blog-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                    </div>
                <?php endwhile; ?>
                
                <!-- Paginación -->
                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('« Anterior', 'muktatma'),
                        'next_text' => __('Siguiente »', 'muktatma'),
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p><?php esc_html_e('No hay publicaciones disponibles.', 'muktatma'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>